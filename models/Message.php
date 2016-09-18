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
 * Message Model
 */
class Message extends Model
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
    public $table = 'theone74_telegram_message';

    public $belongsTo = [
        'user' => [
            'TheOne74\Telegram\Models\User',
            // 'key'      => 'my_user_id',
            // 'otherKey' => 'my_role_id'
        ],
        'chat' => [
            'TheOne74\Telegram\Models\Chat',
            // 'key'      => 'my_user_id',
            // 'otherKey' => 'my_role_id'
        ]
    ];
}