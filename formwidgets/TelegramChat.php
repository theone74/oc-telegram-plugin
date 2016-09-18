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
use TheOne74\Telegram\Models\Chat;

/**
 * Backend form widget for select chat
 */
class TelegramChat extends FormWidgetBase
{
    protected $defaultAlias = 'telechat';

    public function widgetDetails()
    {
        return [
            'name'        => 'Telegram Chat',
            'description' => 'Renders a chat selector field.'
        ];
    }

    public function init()
    {
        parent::init();
    }

    public function render() {
        $this->getChatsInfo();
        $this->vars['field'] = $this->formField;
        return $this->makePartial('body', ['field' => $this->vars['field']]);
    }

    public function getChatsInfo() {
        $res = [];
        $chats = Chat::all();
        foreach ($chats as $k => $v) {
            $res[$v->id] = $v->listTitle;
            // switch ($v->type) {
            //     case 'private':
            //         $res[$v->id] = sprintf('"%s" private chat', $v->user[0]->username);
            //         break;
            //     case 'group':
            //         $res[$v->id] = sprintf('"%s" group chat', $v->title);
            //         break;
            // }
        }
        $this->vars['fieldOptions'] = $res;
    }
}
