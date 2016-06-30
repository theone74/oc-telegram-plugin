<?php namespace TheOne74\Telegram\Classes;

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