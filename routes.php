<?php

// use \Longman\TelegramBot\Telegram;
use TheOne74\Telegram\Classes\TelegramApi;
use \Longman\TelegramBot\Request;
use \Longman\TelegramBot\Exception\TelegramException;
use \TheOne74\Telegram\Models\TelegramInfoSettings;

Route::get('/p', array(function(){
	//echo ('test');

	try {
		$telegram = new Telegram('184352179:AAFDdU2iaCc2_W-vxppsgTGqrxc72wtTR7Y',
			'inf0_bot');
		$mysql_credentials = [
			'host'      => '192.168.1.173',
			'database'  => 'test123_sandbox',
			'user'  		=> 'sandbox',
			'password'  => 'hvmFcKBViAaJ',
		];
		$telegram->enableMySQL($mysql_credentials, 'theone74_telegram_');
		// $telegram->enableExternalMySQL(\Db::connection()->getPdo(), 'theone74_telegram_');
		$telegram->unsetWebHook();
		//\Longman\TelegramBot\TelegramLog::initDebugLog('/tmp/tele_debug.log');
		$a = $telegram->handleGetUpdates();
		var_dump($a);
		//$result = Request::sendMessage(['chat_id' => 121045255, 'text' => 'Your utf8 text 😜 ...']);
		//var_dump($result);
	} catch (TelegramException $e) {
    echo $e;
	}
}));


Route::get('/x', array(function(){
	try {

    $telegram = new TelegramApi(
			TelegramInfoSettings::instance()->get('token'),
			TelegramInfoSettings::instance()->get('name')
		);

		// $telegram->addCommandsPathMy(plugins_path('theone74/telegram/commands'), true);

		$mysql_credentials = [
			'host'      => Config::get('database.connections.mysql.host'),
			'database'  => Config::get('database.connections.mysql.database'),
			'user'  		=> Config::get('database.connections.mysql.username'),
			'password'  => Config::get('database.connections.mysql.password'),
		];
		$telegram->enableMySQL($mysql_credentials, 'theone74_telegram_');

		$result = Request::sendMessage(['chat_id' => 121045255, 'text' => 'Your utf8 text 😜 ...']);
		var_dump('<pre>', $result->getResult()->getMessageId()); //2185
		var_dump(date('Y-m-d H:i:s'));
		// $data = [];
		// $data['chat_id'] = 121045255;
		// $data['parse_mode'] = 'HTML';
		// $data['disable_web_page_preview'] = true;
		// $data['text'] = 'xxxx!!!';

		// $data['message_id'] = 2185;
    // $result =  Request::editMessageText($data);
		// var_dump('<pre>', $result);

	} catch (TelegramException $e) {
		var_dump ($e);
	}
}));


Route::post('/telehook/{token}', array(function($token){

	if (TelegramInfoSettings::instance()->get('token') != $token) {
		\Log::error('Undefined token '.$token);
		App::abort(403, 'Unauthorized action.');
		return;
	}

	try {
        // Create Telegram API object
        $telegram = TelegramApi::instance();

        // Handle telegram webhook request
        $telegram->handle();

	} catch (TelegramException $e) {
		\Log::error($e);
	}
}));
