<?php namespace TheOne74\Telegram\Models;

use Model;

/**
 * Model
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
            // 'key'      => 'my_user_id',
            // 'otherKey' => 'my_role_id'
        ]
    ];

}