<?php namespace TheOne74\Telegram\Classes;

use \TheOne74\Telegram\Models\TelegramInfoSettings;
use \Longman\TelegramBot\Exception\TelegramException;
use \Longman\TelegramBot\Request;

class TelegramApi
extends \Longman\TelegramBot\Telegram
{

    public static $_instance;
	protected $commands_namespaces = [];

	public function __construct($api_key, $bot_name)
	{
		parent::__construct($api_key, $bot_name);
		$this->addCommandsPathMy(plugins_path('theone74/telegram/commands'), 'TheOne74\\Telegram\\Commands');
	}

	public function addCommandsPath($path, $before = true) {/* dummy */}

	public function addCommandsPathMy($path, $namespace, $before = true)
	{
			if (!is_dir($path)) {
					throw new TelegramException('Commands path "' . $path . '" does not exist!');
			}
			if (!in_array($path, $this->commands_paths)) {
					if ($before) {
							array_unshift($this->commands_paths, $path);
					} else {
							array_push($this->commands_paths, $path);
					}
			}
			if (!in_array($namespace, $this->commands_namespaces)) {
					if ($before) {
							array_unshift($this->commands_namespaces, $namespace);
					} else {
							array_push($this->commands_namespaces, $namespace);
					}
			}
			return $this;
	}

	public function getCommandObject($command)
	{
			$which = ['System'];
			($this->isAdmin()) && $which[] = 'Admin';
			$which[] = 'User';

			foreach ($this->commands_namespaces as $namespace) {
				foreach ($which as $auth) {
						$command_namespace = $namespace . '\\' . $auth . 'Commands\\' . $this->ucfirstUnicode($command) . 'Command';
						if (class_exists($command_namespace)) {
								return new $command_namespace($this, $this->update);
						}
				}
			}

			return null;
	}

    public static function instance(){

        if ( ! self::$_instance) {
            if ( ! TelegramInfoSettings::instance()->get('token')) {
                throw new \Exception('Token not set');
            }

            if ( ! TelegramInfoSettings::instance()->get('name')) {
                throw new \Exception('Bot name not set');
            }

            self::$_instance = new TelegramApi(
                TelegramInfoSettings::instance()->get('token'),
                TelegramInfoSettings::instance()->get('name')
            );

            $mysql_credentials = [
                'host'      => \Config::get('database.connections.mysql.host'),
                'database'  => \Config::get('database.connections.mysql.database'),
                'user'  	=> \Config::get('database.connections.mysql.username'),
                'password'  => \Config::get('database.connections.mysql.password'),
            ];
            // TODO
            self::$_instance->enableMySQL($mysql_credentials, 'theone74_telegram_');
        }

        return self::$_instance;

    }

    public function sendMessage(array $data) {
        return Request::sendMessage($data);
    }

}
