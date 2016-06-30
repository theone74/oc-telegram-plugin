<?php namespace TheOne74\Telegram\Classes;

class TelegramApi 
extends \Longman\TelegramBot\Telegram 
{

	public function __construct($api_key, $bot_name) 
	{
		parent::__construct($api_key, $bot_name);
		$this->addCommandsPathMy(plugins_path('theone74/telegram/commands'), true);
	}

	public function addCommandsPath($path, $before = true) {/* dummy */}

	public function addCommandsPathMy($path, $before = true)
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
			return $this;
	}

	public function getCommandObject($command)
	{
			$which = ['System'];
			($this->isAdmin()) && $which[] = 'Admin';
			$which[] = 'User';

			foreach ($which as $auth) {
					$command_namespace = 'TheOne74\\Telegram\\Commands\\' . $auth . 'Commands\\' . $this->ucfirstUnicode($command) . 'Command';
					if (class_exists($command_namespace)) {
							return new $command_namespace($this, $this->update);
					}
			}

			return null;
	}

}
