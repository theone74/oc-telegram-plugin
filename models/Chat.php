<?php namespace TheOne74\Telegram\Models;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */
 
use Model;

/**
 * Chat Model
 */
class Chat extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'theone74_telegram_chat';

    public $belongsToMany = [
        'user' => [
            'TheOne74\Telegram\Models\User',
            'table'    => 'theone74_telegram_user_chat',
        ]
    ];

    function getListTitleAttribute() {

        switch ($this->type) {
            case 'private':
                return sprintf('"%s" private chat', $this->user[0]->username_str);
                break;
            case 'group':
                return sprintf('"%s" group chat', $this->title);
                break;
        }

        return '';
    }

}
