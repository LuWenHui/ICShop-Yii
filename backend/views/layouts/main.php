<?php
use yii\helpers\Html;
use backend\assets\AppAsset;

AppAsset::register($this);

$this->context->layout = false;
$this->title = '传智播客-商城系统';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="app">
    <head>
        <meta charset="<?= Yii::$app->charset ?>" />
        <title><?= $this->title ?></title>
        <meta name="description" content="<?= $this->title ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <?= Html::csrfMetaTags() ?>
        <?= $this->head() ?>
    </head>
    <body class="" >
        <?php $this->beginBody() ?>
        <section class="vbox">
            <!-- .header -->
                <?= $this->render('_partials/_header') ?>
            <!-- /.header -->
            <section>
                <section class="hbox stretch">
                    <!-- .aside -->
                        <?= $this->render('_partials/_aside') ?>
                    <!-- /.aside -->
                    <section id="content">
                        <section class="vbox">
                            <section class="scrollable wrapper">
                                <?= $content ?>
                            </section>
                        </section>
                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                    </section>
                </section>
            </section>
        </section>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>