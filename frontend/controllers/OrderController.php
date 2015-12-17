<?php

namespace frontend\controllers;

use Yii;
use common\components\Controller;
use frontend\models\CreateProductOrderForm;

class OrderController extends Controller {
    public function actionCreate() {
        $order = new CreateProductOrderForm();
        $order->load(Yii::$app->request->post(), ''); 
        if ($order->save(true)) {
            return $this->redirect(['order/success'], compact('order'));
        } else {
            return $this->render('create', compact('order'));
        }
    }

    public function actionSuccess() {
        return $this->render('success');
    }
}
