<?php namespace TheOne74\Telegram\Commands\UserCommands;
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Conversation;

/**
 * User "/help" command
 */
class HelloCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'hello';
    protected $description = 'Show hello';
    protected $usage = '/hello';
    protected $version = '1.0.1';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {

			$message = $this->getMessage();

			$chat = $message->getChat();
			$user = $message->getFrom();
			$text = trim($message->getText(true));
			trace_log($text);

			$chat_id = $chat->getId();
			$user_id = $user->getId();

			//Preparing Respose
      $data = [];
      $data['chat_id'] = $chat_id;

			$word = $text ? $text : 'Привет';

			for($i = 1; $i<= mb_strlen($word); $i++) {
				$data['text'] = mb_substr($word, 0, $i);
				if ($i == 1) {
					$result = Request::sendMessage($data);
					//trace_log($result);
					$data['message_id'] = $result->getResult()->getMessageId();
				}
				else {
					$result =  Request::editMessageText($data);
				}
			}
			return $result;
    }
}
