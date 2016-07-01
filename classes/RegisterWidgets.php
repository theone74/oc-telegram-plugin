<?php namespace TheOne74\Telegram\Classes;

use Lang;
use RainLab\Builder\Classes\ControlLibrary;

class RegisterWidgets {

    protected $controlLibrary;

    public function __construct($controlLibrary)
    {
        $this->controlLibrary = $controlLibrary;

        $this->registerControls();
    }

    protected function registerControls()
    {
        $properties = [
            // 'options' =>  [
            //     'title' => Lang::get('rainlab.builder::lang.form.property_options'),
            //     'type' => 'dictionary',
            //     'ignoreIfEmpty' => true,
            //     'sortOrder' => 81
            // ],
            // 'form' => [
            //     'type' => 'control-container'
            // ]
        ];

        $ignoreProperties = [
            // 'stretch',
            // 'placeholder',
            // 'default',
            // 'required',
            // 'defaultFrom',
            // 'dependsOn',
            // 'trigger',
            // 'preset',
            // 'attributes'
        ];

        $this->controlLibrary->registerControl('telechat',
            'Telegram Chat',
            'Renders a chat selector field.',
            ControlLibrary::GROUP_WIDGETS,
            'icon-paper-plane-o',
            $this->controlLibrary->getStandardProperties($ignoreProperties, $properties),
            'TheOne74\Telegram\Classes\WidgetDesignTimeProvider'
        );
    }
}
