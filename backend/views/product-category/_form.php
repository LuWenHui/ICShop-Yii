<?php

use yii\widgets\ActiveForm;
use common\models\ProductCategory;

?>
<div class="row">
    <?php $form = ActiveForm::begin([
        'method' => 'post',
    ]) ?>
        <div class="col-md-8">
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'parent_id')->dropDownList(ProductCategory::getTreeIdNameList(), [
                'class' => 'form-control chosen-select',
            ]) ?>
            <?= $form->field($model, 'display_order')->textInput() ?>
            
            <div class="col-md-12">
                <button class="btn btn-primary pull-right col-md-4">提交</button>
            </div>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'icon_class')->textInput() ?>
        </div>    
    <?php ActiveForm::end() ?>
</div>

<?php
$js = <<<'JS'
uiLoad.load(jp_config['chosen']).then(function() {
    $(".chosen-select").chosen({
        allow_single_deselect: true,
        no_results_text: '没有记录匹配',
        placeholder_text_single: '请选择一个分类(不选择即表示顶级分类)'
    });
});
JS;
$this->registerJs($js);
?>