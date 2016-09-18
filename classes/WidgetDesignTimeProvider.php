<?php namespace TheOne74\Telegram\Classes;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */
 
use RainLab\Builder\Widgets\DefaultControlDesignTimeProvider;

class WidgetDesignTimeProvider extends DefaultControlDesignTimeProvider {

    public function renderControlBody($type, $properties, $formBuilder)
    {
        if ($type == 'telechat') {
            return $this->makePartial('control-telechat', [
                'properties'=>$properties,
                'formBuilder' => $formBuilder
            ]);
        }

        parent::renderControlBody($type, $properties, $formBuilder);
    }

}