<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AppAsset;
use yii\widgets\ActiveForm;

AppAsset::register($this);

$this->context->layout = false;
$this->title = '传智播客-商城系统-登录';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>" />
        <title><?= $this->title ?></title>
        <meta name="description" content="<?= $this->title ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <?= Html::csrfMetaTags() ?>
        <?= $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
        <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
            <a class="nav-brand" href="<?= Url::to('/') ?>">传智播客-商城系统</a>
            <div class="row m-n">
                <div class="col-md-4 col-md-offset-4 m-t-lg">
                    <section class="panel">
                        <header class="panel-heading text-center">
                            登录
                        </header>
                        <?= Html::errorSummary($adminUserLoginForm, ['class' => 'alert alert-danger']) ?>
                        <?php $form = ActiveForm::begin(['options' => ['class' => 'panel-body']]) ?>
                            <div class="form-group">
                                <label class="control-label">邮箱</label>
                                <?= Html::activeInput('email', $adminUserLoginForm, 'email', ['placeholder' => 'test@example.com', 'class' => 'form-control']) ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">密码</label>
                                <?= Html::activeInput('password', $adminUserLoginForm, 'password', ['placeholder' => '请输入密码', 'class' => 'form-control']) ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                <input type="checkbox"> 这是私人电脑
                                </label>
                            </div>
                            <a href="javascript:" class="pull-right m-t-xs" data-toggle="tooltip" data-placement="top" title="请联系系统管理员"><small>忘记密码?</small></a>
                            <button type="submit" class="btn btn-info">登录</button>
                        <?php ActiveForm::end() ?>
                    </section>
                </div>
            </div>
        </section>
        <!-- footer -->
        <footer id="footer">
            <div class="text-center padder clearfix">
                <p>
                    <small>传智播客 &copy; <?= date('Y') ?></small>
                </p>
            </div>
        </footer>
        <!-- / footer -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>