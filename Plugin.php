<?php namespace TheOne74\Telegram;

use System\Classes\PluginBase;
use TheOne74\Telegram\Classes\RegisterWidgets;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Bot Settings',
                'description' => 'Manage bot settings.',
                'category'    => 'Telegram',
                'icon'        => 'oc-icon-at',
                'class'       => 'TheOne74\Telegram\Models\TelegramInfoSettings',
                'order'       => 500,
                'keywords'    => 'telegram bot',
                // 'permissions' => ['acme.users.access_settings']
            ]
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'TheOne74\Telegram\FormWidgets\TelegramChat' => [
                'label' => 'Telegram Chat',
                'code'  => 'telechat',
                'alias'  => 'telechat',
            ]
        ];
    }

    public function boot() {
        \Event::listen('pages.builder.registerControls', function($controlLibrary) {
            new RegisterWidgets($controlLibrary);
        });
    }
}
