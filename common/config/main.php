<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        // ...
                    ],
                ],
            ],
        ],
        'fileStorage'=>[
            'class' => 'trntv\filekit\Storage',
            'baseUrl' => 'http://upload.itcast-shop.dev',
            'filesystem'=> [
                'class' => 'common\components\LocalFlysystemBuilder',
                'path' => dirname(dirname(__DIR__)) . '/upload',
            ],
        ],
    ],
];
