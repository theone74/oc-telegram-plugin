<?php namespace TheOne74\Telegram\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Users extends Controller
{
    public $implement = ['Backend\Behaviors\ListController'];
	public $requiredPermissions = ['theone74.telegram.show.users'];
    
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('TheOne74.Telegram', 'main-menu-item', 'side-menu-item');
    }
}