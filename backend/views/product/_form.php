<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Product;
use common\models\ProductCategory;
use common\models\ProductAttributeCategory;
use common\models\ProductAttribute;
use yii\jui\DatePicker;
use trntv\filekit\widget\Upload;
use kucha\ueditor\UEditor;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <?php $form = ActiveForm::begin(); ?>
    <section class="panel panel-default">
        <header class="panel-heading bg-light">
            <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#basic" data-toggle="tab" aria-expanded="true"><i class="fa fa-comments text-muted"></i> 基本信息</a></li>
            <li class=""><a href="#description" data-toggle="tab" aria-expanded="false"><i class="fa fa-user text-muted"></i> 描述</a></li>
            <li class=""><a href="#picture" data-toggle="tab" aria-expanded="false"><i class="fa fa-cog text-muted"></i> 图片</a></li>
            </ul>
            <span class="hidden-sm"><?= $this->title ?></span>
        </header>
        <div class="panel-body">
            <div class="tab-content">              
            <div class="tab-pane active" id="basic">
                <?= $form->field($model, 'category_id')->dropDownList(ProductCategory::getTreeIdNameList(), ['class' => ['class' => 'chosen-select form-control']]) ?>
            
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'inventory')->textInput() ?>
            
                <?= $form->field($model, 'logo')->widget(
                    Upload::className(),
                    [
                        'url' => ['upload'],
                        'sortable' => true,
                        'maxFileSize' => 10 * 1024 * 1024, // 10 MiB
                        'maxNumberOfFiles' => 1,
                        'clientOptions' => [],
                    ]
                ) ?>
            
                <?= $form->field($model, 'our_price')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'market_price')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'promotion_price')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'promotion_start_time')->widget(DatePicker::classname(), [
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ])  ?>
            
                <?= $form->field($model, 'promotion_end_time')->widget(DatePicker::classname(), [
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ])  ?>
            
                <?= $form->field($model, 'is_new')->dropDownList(Product::getIsNewLabels()) ?>
            
                <?= $form->field($model, 'is_hot')->dropDownList(Product::getIsHotLabels()) ?>
            
                <?= $form->field($model, 'is_best')->dropDownList(Product::getIsBestLabels()) ?>
            
                <?= $form->field($model, 'score')->textInput() ?>
            
                <?= $form->field($model, 'status')->dropDownList(Product::getStatusLabels()) ?>
            
                <?= $form->field($model, 'display_order')->textInput() ?>
            </div>
            <div class="tab-pane" id="description">
                <?= $form->field($model, 'description')->widget(UEditor::className(), [
                    'clientOptions' => [
                        'serverUrl' => Url::to(['product/ueditor-upload']),
                        //编辑区域大小
                        'initialFrameHeight' => '200',
                        //设置语言
                        'lang' =>'zh-cn', //中文为 zh-cn
                        //定制菜单
                        'toolbars' => [
                            [
                                'fullscreen', 'source', 'undo', 'redo', '|',
                                'fontsize',
                                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                                'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                                'forecolor', 'backcolor', '|',
                                'lineheight', '|',
                                'indent', '|',
                                'insertimage', 'imagenone', 'imageleft', 'imageright', 'imagecenter',
                            ],
                        ],
                    ],
                ]) ?>
            </div>
            <div class="tab-pane" id="picture">
                <?= $form->field($model, 'pictures')->widget(
                    Upload::className(),
                    [
                        'url' => ['upload'],
                        'sortable' => true,
                        'maxFileSize' => 10 * 1024 * 1024, // 10 MiB
                        'maxNumberOfFiles' => 10,
                        'clientOptions' => [],
                    ]
                ) ?>
            </div>
            </div>
        </div>
    </section>
    <div class="form-group">
        <?= Html::submitButton($model->product->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->product->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>