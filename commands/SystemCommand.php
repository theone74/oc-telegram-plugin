<?php namespace TheOne74\Telegram\Commands;
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Longman\TelegramBot\Commands\Command;
use Longman\TelegramBot\Request;

/**
 * Abstract System Command Class
 */
abstract class SystemCommand extends Command
{
    /**
     * A system command just executes
     *
     * Although system commands should just work and return a successful ServerResponse,
     * each system command can override this method to add custom functionality.
     *
     * @return Entities\ServerResponse
     */
    public function execute()
    {
        //System command, return empty ServerResponse
        return Request::emptyResponse();
    }
}
