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
 * Left chat member command
 */
class LeftchatmemberCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'Leftchatmember';
    protected $description = 'Left Chat Member';
    protected $version = '1.0.1';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    /*public function execute()
    {
        //$message = $this->getMessage();
        //$member = $message->getLeftChatMember();
    }*/
}
