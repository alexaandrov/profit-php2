<?php

namespace App;

class View implements \Countable
{
    use RWLive;

//    public $css;
//    public $js;

    public function __construct()
    {
        $this->css = $this->render(__DIR__ . '/../web/templates/assets/css.php');
        $this->js = $this->render(__DIR__ . '/../web/templates/assets/js.php');
        $this->header = $this->render(__DIR__ . '/../web/templates/header.php');
    }

    public function display($template)
    {
        $this->body = $this->render($template);
        echo $this->render(__DIR__ . '/../web/templates/main.php');
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
}