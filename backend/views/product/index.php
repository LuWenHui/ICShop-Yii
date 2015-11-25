<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'category_id',
                'value' => 'category.name',
            ],
            'name',
            'inventory',
            [
                'attribute' => 'logo',
                'format' => ['image', ['width' => '50px']],
                'value' => 'logoAccessUrl',
                'filter' => false,
            ],
            [
                'attribute' => 'our_price',
                'filter' => false,
            ],
            [
                'attribute' => 'market_price',
                'filter' => false,
            ],
            [
                'attribute' => 'promotion_price',
                'filter' => false,
            ],
            'promotion_start_time:datetime',
            'promotion_end_time:datetime',
            [
                'attribute' => 'is_new',
                'value' => 'isNewLabel',
            ],
            [
                'attribute' => 'is_hot',
                'value' => 'isHotLabel',
            ],
            [
                'attribute' => 'is_best',
                'value' => 'isBestLabel',
            ],
            [
                'attribute' => 'display_order',
                'filter' => false,
            ],
            'score',
            [
                'attribute' => 'status',
                'value' => 'statusLabel',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {update-attributes} {delete}',
                'buttons' => [
                    'update-attributes' => function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('app', 'Update'),
                            'aria-label' => Yii::t('app', 'Update'),
                            'data-pjax' => '0',
                        ], []);
                        return Html::a('<span class="fa fa-pencil-square"></span>', $url);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
