<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => '商城后台',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'dashboard/index',
    'bootstrap' => ['log'],
    'modules' => [
        'mimin' => [
            'class' => '\hscstudio\mimin\Module',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\AdminUser',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/login'],
        ],
        'assetManager' => [
            'bundles' => [
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'whoops/error',
        ],
    ],
    'params' => $params,
    
    'as access' => [
        'class' => '\hscstudio\mimin\components\AccessControl',
        'allowActions' => [
            // add wildcard allowed action here!
            'site/*',
            'debug/*',
            'mimin/*', // only in dev mode
        ],
    ],
];
