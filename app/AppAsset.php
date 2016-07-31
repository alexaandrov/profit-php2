<?php

namespace App;

/**
 * @author Greg Alexandrov <alexandrovg@gmail.com>
 * @since 2.0
 */
class AppAsset
{
    public $assetsPath = '/web/assets/';

    public $css = [
        'css/main.css',
        'css/bootstrap.min.css'
    ];
    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.js'
    ];

    public function getCss()
    {
        return $this->css;
    }
}