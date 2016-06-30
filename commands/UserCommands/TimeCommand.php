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
class TimeCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'time';
    protected $description = 'Show time';
    protected $usage = '/time';
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
			$text = $message->getText(true);

			$chat_id = $chat->getId();
			$user_id = $user->getId();

			//Preparing Respose
      $data = [];
      $data['chat_id'] = $chat_id;
			
			//trace_log($message->getMessageId());
			//Conversation start
      $this->conversation = new Conversation($user_id, $chat_id, $this->getName());

			//cache data from the tracking session if any
			if (!isset($this->conversation->notes['msgid'])) {
					$data['text'] = date('Y-m-d H:i:s');
					$this->conversation->notes['counter'] = 0;
					$result = Request::sendMessage($data);
					if ($result->isOk()) {
						$this->conversation->notes['msgid'] = $result->getResult()->getMessageId();
					}
					$this->conversation->update();
					return $result;

			} else {
					$data['message_id'] = $this->conversation->notes['msgid'];
					// $data['message_id'] = $message->getMessageId();
					$data['text'] = date('Y-m-d H:i:s') . " 😜";
					$this->conversation->notes['counter'] = intval($this->conversation->notes['counter'])+1;
					$this->conversation->update();
					$result =  Request::editMessageText($data);
					// trace_log($result);
					if ($this->conversation->notes['counter'] > 10) {
						$this->conversation->stop();
					}
					return $result;
			}

			//$data['text'] = $counter;


			return;

        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $message_id = $message->getMessageId();
        $command = trim($message->getText(true));

        //Only get enabled Admin and User commands
        $commands = array_filter($this->telegram->getCommandsList(), function ($command) {
            return (!$command->isSystemCommand() && $command->isEnabled());
        });

        //If no command parameter is passed, show the list
        if ($command === '') {
            $text = $this->telegram->getBotName() . ' v. ' . $this->telegram->getVersion() . "\n\n";
            $text .= 'Commands List:' . "\n";
            foreach ($commands as $command) {
                $text .= '/' . $command->getName() . ' - ' . $command->getDescription() . "\n";
            }

            $text .= "\n" . 'For exact command help type: /help <command>';
        } else {
            $command = str_replace('/', '', $command);
            if (isset($commands[$command])) {
                $command = $commands[$command];
                $text = 'Command: ' . $command->getName() . ' v' . $command->getVersion() . "\n";
                $text .= 'Description: ' . $command->getDescription() . "\n";
                $text .= 'Usage: ' . $command->getUsage();
            } else {
                $text = 'No help available: Command /' . $command . ' not found';
            }
        }

        $data = [
            'chat_id'             => $chat_id,
            'reply_to_message_id' => $message_id,
            'text'                => $text,
        ];

        return Request::sendMessage($data);
    }
}
