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
 * Migrate from chat id command
 */
class MigratefromchatidCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'Migratefromchatid';
    protected $description = 'Migrate from chat id';
    protected $version = '1.0.1';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    /*public function execute()
    {
        //$message = $this->getMessage();
        //$migrate_from_chat_id = $message->getMigrateFromChatId();
    }*/
}
