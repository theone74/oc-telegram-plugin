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
 * User Model
 */
class User extends Model
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
    public $table = 'theone74_telegram_user';

	function getUsernameStrAttribute() { 
		$name = $this->id;
		if (($this->username)) {
			$name = $this->username;
		}
		else { 
			if (($this->first_name)) {
				$name = $this->first_name;
			}
			if (($this->last_name)) {
				$name .= (isset($this->first_name) ? ' ' : '') . $this->last_name;
			}
		}
		return $name;
	}
}