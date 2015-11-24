<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

// 上传配置
Yii::setAlias('uploadweb', 'http://upload.itcast-shop.dev');
Yii::setAlias('uploadwebroot', dirname(dirname(__DIR__)) . '/upload');