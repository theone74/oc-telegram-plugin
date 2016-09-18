<?php namespace TheOne74\Telegram\Controllers;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */
 
use Backend\Classes\Controller;
use BackendMenu;
use TheOne74\Telegram\Classes\TelegramApi;
use \Longman\TelegramBot\Request;
use \Longman\TelegramBot\Exception\TelegramException;
use \TheOne74\Telegram\Models\TelegramInfoSettings;

class Chats extends Controller
{
    public $implement = ['Backend\Behaviors\ListController'];
	public $requiredPermissions = ['theone74.telegram.show.chats'];

    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('TheOne74.Telegram', 'main-menu-item', 'side-menu-item3');
    }

    public function onLoadSendWindow() {

        $this->vars['chat_id'] = intval(post('chat_id'));

        return $this->makePartial('send_modal');
    }

    public function onSend() {
        if ( ! $this->user->hasPermission('theone74.telegram.send')) {
            throw new \Exception('No permissions');
        }
        $chat_id = post('chat_id');
        $text = post('text');
        $telegram = TelegramApi::instance();
        $result = Request::sendMessage(['chat_id' => $chat_id, 'text' => $text]);
        if ($result->isOk()) {
            \Flash::success($result->getDescription());
        }
        return ;// $result->getResult()->getMessageId();
    }
}
