<?php namespace TheOne74\Telegram\FormWidgets;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */
 
use Backend\Classes\FormWidgetBase;
use \Longman\TelegramBot\Request;
use \TheOne74\Telegram\Classes\TelegramApi;

/**
 * Backend form widget for check webhook
 */
class CheckWebhook extends FormWidgetBase
{
    protected $defaultAlias = 'checkwebhook';

    public function widgetDetails()
    {
        return [
            'name'        => 'Telegram check webhook button',
            'description' => 'Renders field with check webhook button.'
        ];
    }

    public function init()
    {
        parent::init();
    }

    public function render() {
        $this->vars['field'] = $this->formField;
        return $this->makePartial('body', ['field' => $this->vars['field']]);
    }

    public function onCheckWebhook() {
        TelegramApi::instance();
        $r = Request::getWebhookInfo();
        return $this->makePartial('wnd', ['req' => $r]);
    }
}
