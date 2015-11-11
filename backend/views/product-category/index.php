<?php
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ProductCategory'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'List');

$this->title = '产品分类';
?>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-info pull-right col-md-4" href="<?= Url::to(['product-category/create']) ?>"><?= Yii::t('app', 'Create') ?></a>
    </div>
    <div class="col-md-12">
        <?= GridView::widget([
            'pager' => [
                'options' => [
                    'class' => 'pagination pull-right',
                ],
            ],
            'dataProvider' => $dataProvider,
            'filterModel' => $filterModel,
            'columns' => [
                'id',
                'name',
                'updated_at:datetime',
                'slug',
                [
                    'class' => ActionColumn::className(),
                    // you may configure additional properties here
                ],
            ],
        ]) ?>
    </div>
</div>