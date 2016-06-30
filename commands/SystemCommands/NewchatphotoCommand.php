<?php namespace TheOne74\Telegram\Commands\SystemCommands;
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Longman\TelegramBot\Commands\SystemCommand;

/**
 * New chat photo command
 */
class NewchatphotoCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'Newchatphoto';
    protected $description = 'New chat Photo';
    protected $version = '1.0.1';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    /*public function execute()
    {
        //$message = $this->getMessage();
        //$new_chat_photo = $message->getNewChatPhoto();
    }*/
}
