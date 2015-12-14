<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends Controller
{
    public function actionView($id) {
        $product = $this->getModel($id);
        return $this->render('view', compact('product'));
    }

    public function getModel($id) {
        $product = Product::findOne($id);
        if (!$product) {
            throw new NotFoundHttpException(Yii::t('app', 'specify product could not be found.'));
        } else {
            return $product;
        }
    }
}
