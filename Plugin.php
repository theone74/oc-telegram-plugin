<?php namespace TheOne74\Telegram;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */

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
            ],
            'TheOne74\Telegram\FormWidgets\CheckWebhook' => [
                'label' => 'Telegram check webhook button',
                'code'  => 'checkwebhook',
                'alias'  => 'checkwebhook',
            ],
        ];
    }

    public function boot() {
        \Event::listen('pages.builder.registerControls', function($controlLibrary) {
            new RegisterWidgets($controlLibrary);
        });
    }
}
