<?php
/**
 * @link http://php.itcast.cn/
 * @copyright Copyright (c) 2015 itcast
 * @license all rights reserved
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author 苏小林 <suxiaolin@mail.com>
 * @since 2.0
 */
class TodoAsset extends AssetBundle
{
    public $baseUrl = '@web/todo';
    public $css = [
        "css/animate.css",
        "css/font-awesome.min.css",
        "css/font.css",
        "css/plugin.css",
        "css/app.css",
    ];
    public $js = [
        "js/app.js",
        "js/app.plugin.js",
        "js/app.data.js",
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'backend\assets\IeJsAsset',
    ];
}
