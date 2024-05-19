<?php

namespace app\assets;

use yii\web\AssetBundle;

class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
        'css/vendor/slick.css',
        'css/site.css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
        /*"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"*/

    ];

    public $js = [
        'https://code.jquery.com/jquery-3.7.1.js',
        'js/yii.js',
        'js/activeform.js',
        'js/validation.js',
        'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js',
    ];
}