<?php

namespace App;

class View implements \Countable
{
    use RWLive;

//    public $css;
//    public $js;

    public function __construct()
    {
        $this->css = $this->getAsset('css');
        $this->js = $this->getAsset('js');
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function render($template)
    {
        ob_start();
        foreach ($this->data as $prop => $value) {
            $$prop = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public static function getAsset($assetName)
    {
        ob_start();
        switch ($assetName) {
            case 'js':
                include __DIR__ . '/../web/templates/assets/' . $assetName . '.php';
                $$assetName = ob_get_contents();
                break;
            case 'css':
                include __DIR__ . '/../web/templates/assets/' . $assetName . '.php';
                $$assetName = ob_get_contents();
                break;
            default:
                $assetName = null;
        }
        ob_end_clean();
        return $$assetName;
    }
}