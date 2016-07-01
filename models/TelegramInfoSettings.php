<?php namespace TheOne74\Telegram\Models;

use Model;
use Flash;
use Config;
use TheOne74\Telegram\Classes\TelegramApi;
use TheOne74\Telegram\Models\User;
// use \Longman\TelegramBot\Telegram;




/**
* TelegramInfoSettings Model
 */
class TelegramInfoSettings extends Model
{
	use \October\Rain\Database\Traits\Validation;

	public $implement = ['System.Behaviors.SettingsModel'];

	// 	A unique code
	public $settingsCode = 'theone74_telegramm_info';

	// 	Reference to field configuration
	public $settingsFields = 'fields.yaml';

	public $rules = [
        'name'       => 'required|between:1,16',
        'is_webhook' => 'required|boolean',
        'cert_path'  => 'required|string',
        'token'      => 'required|regex:/^[0-9]+:[a-z0-9\-_]+$/i'
    ];

	public $customMessages = [];

	function unparse_url($parsed_url) {
		$scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
		$host     = isset($parsed_url['host']) ? $parsed_url['host'] : '';
		$port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
		$user     = isset($parsed_url['user']) ? $parsed_url['user'] : '';
		$pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
		$pass     = ($user || $pass) ? "$pass@" : '';
		$path     = isset($parsed_url['path']) ? $parsed_url['path'] : '';
		$query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
		$fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
		return "$scheme$user$pass$host$port$path$query$fragment";
	}

	function afterSave() {

		$url = parse_url(Config::get('app.url'));
		$url['scheme'] = 'https';
		$url['path'] = '/telehook/'.$this->get('token');
		$url = $this->unparse_url($url);

		$telegram = new TelegramApi($this->get('token'), $this->get('name'));

		if ($this->get('is_webhook')) {
			$result = $telegram->setWebHook($url, $this->get('cert_path'));
			if ($result->isOk()) {
				Flash::success($result->getDescription());
			}
		}
		else {
			$result = $telegram->unsetWebHook();
			if ($result->isOk()) {
				Flash::success($result->getDescription());
			}
		}
	}

	public function beforeValidate()
	{
		// $this->rules['admins'] = 'required';
		// 		if you want the repeater to have at least one productItem
		foreach ($this->admins as $index => $Item) {
			$this->rules['admins.'.$index.'.admin'] = 'integer';
			$this->customMessages['admins.'.$index.'.admin.integer'] = 'Admin number '.$index.' needs to be a integer.';
		}
	}

    public function getAdminOptions()
    {
        User::all()->lists('username', 'id');
        return User::all()->lists('username', 'id');
    }
}
