<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class IeJsAsset extends AssetBundle {
    public $basePath = '@webroot/todo';
    public $baseUrl = '@web/todo';

    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => View::POS_HEAD,
    ];

    public $js = [
        'js/ie/respond.min.js',
        'js/ie/html5.js',
        'js/ie/fix.js',
    ];
}
