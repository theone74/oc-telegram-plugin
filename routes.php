<?php

use TheOne74\Telegram\Classes\TelegramApi;
use \Longman\TelegramBot\Request;
use \Longman\TelegramBot\Exception\TelegramException;
use \TheOne74\Telegram\Models\TelegramInfoSettings;


Route::post('/telehook/{token}', array(function($token){

	if (TelegramInfoSettings::instance()->get('token') != $token) {
		\Log::error('Undefined token '.$token);
		App::abort(403, 'Unauthorized action.');
		return;
	}

	try {
		Event::fire('telegram.init', []);

        // Create Telegram API object
        $telegram = TelegramApi::instance();

		Event::fire('telegram.beforeReceive', []);

        // Handle telegram webhook request
        $telegram->handle();

		Event::fire('telegram.afterReceive', []);

	} catch (TelegramException $e) {
		\Log::error($e);
	}
}));
