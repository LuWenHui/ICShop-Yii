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
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'fileStorage'=>[
            'class' => 'trntv\filekit\Storage',
            'baseUrl' => '@uploadweb',
            'filesystem'=> [
                'class' => 'common\components\LocalFlysystemBuilder',
                'path' => '@uploadwebroot',
            ],
        ],
    ],
];
