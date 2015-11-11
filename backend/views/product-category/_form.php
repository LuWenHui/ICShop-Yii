<?php

use yii\widgets\ActiveForm;
use common\models\ProductCategory;

?>
<div class="row">
    <div class="col-md-8">
        <?php $form = ActiveForm::begin([
            'method' => 'post',
        ]) ?>
        
        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'parent_id')->dropDownList(ProductCategory::getTreeIdNameList(), [
            'class' => 'form-control chosen-select',
        ]) ?>
        <?= $form->field($model, 'display_order')->textInput() ?>
        
        <div class="col-md-12">
            <button class="btn btn-primary pull-right col-md-4">提交</button>
        </div>
        
        <?php ActiveForm::end() ?>
    </div>
</div>

<?php
$js = <<<'JS'
uiLoad.load(jp_config['chosen']).then(function() {
    $(".chosen-select").chosen();
});
JS;
$this->registerJs($js);
?>