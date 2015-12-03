<?php
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use nterms\pagesize\PageSize;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'List');

$this->title = '产品分类';
?>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <?= PageSize::widget(['label' => '行/页']); ?>
        </div>
        <div class="col-md-6">
            <a class="btn btn-info pull-right col-md-4" href="<?= Url::to(['product-category/create']) ?>"><?= Yii::t('app', 'Create') ?></a>
        </div>
    </div>
    <div class="col-md-12">
        <?= GridView::widget([
            'pager' => [
                'options' => [
                    'class' => 'pagination pull-right',
                ],
            ],
            'dataProvider' => $dataProvider,
            'filterSelector' => 'select[name="per-page"]',
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