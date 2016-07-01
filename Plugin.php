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
                'label'       => 'theone74.telegram::lang.settings.page_name',
                'description' => 'theone74.telegram::lang.settings.page_desc',
                'category'    => 'theone74.telegram::lang.plugin.name',
                'icon'        => 'icon-paper-plane',
                'class'       => 'TheOne74\Telegram\Models\TelegramInfoSettings',
                'order'       => 500,
                'keywords'    => 'telegram bot',
                'permissions' => ['theone74.telegram.settings']
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
