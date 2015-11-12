<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ProductAttributeCategory;

/* @var $this yii\web\View */
/* @var $model common\models\ProductAttributeCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-attribute-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(ProductAttributeCategory::getStatusLabels()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
