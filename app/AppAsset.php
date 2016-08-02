<?php

namespace App;

/**
 * @author Greg Alexandrov <alexandrovg@gmail.com>
 * @since 2.0
 */
class AppAsset
{
    public $assetsPath = '/app/web/assets/';

    public $css = [
        'css/bootstrap.min.css',
        'css/main.css',
        'css/font-awesome.min.css'
    ];
    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js'
    ];

    public function getCss()
    {
        return $this->css;
    }
}