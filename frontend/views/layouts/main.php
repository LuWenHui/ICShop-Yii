<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= Yii::$app->charset ?>">
<?= $this->render('partials/_head') ?>
<body>
    <?php $this->beginBody() ?>
    <?= $this->render('partials/_topNav') ?>
    
    <div style="clear:both;"></div>

    <!-- 页面头部 start -->
    <div class="header w990 bc mt15">
        <div class="logo w990">
            <h2 class="fl"><a href="index.html"><img src="/images/logo.png" alt="京西商城"></a></h2>
        </div>
    </div>
    <!-- 页面头部 end -->
    
    <?= $content ?> 
    
    <?= $this->render('partials/_footerCopyright') ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
