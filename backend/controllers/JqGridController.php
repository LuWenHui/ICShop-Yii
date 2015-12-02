<?php

namespace backend\controllers;

use himiklab\jqgrid\actions\JqGridActiveAction;
use common\models\ProductCategory;

class JqGridController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'jqgrid' => [
                'class' => JqGridActiveAction::className(),
                'model' => ProductCategory::className(),
                'scope' => function ($query) {
                    /** @var \yii\db\ActiveQuery $query */
                    $query->select(['*']);
                },
            ],
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
