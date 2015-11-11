<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\ProductCategory;
use backend\models\ProductCategorySearch;

class ProductCategoryController extends Controller {
    public function actionIndex() {
        $filterModel = new ProductCategorySearch();
        $dataProvider = $filterModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('dataProvider', 'filterModel'));
    }
    
    public function actionView($id) {
        $model = $this->findModel($id);
        return $this->render('view', compact('model'));
    }
    
    public function actionCreate() {
        $model = new ProductCategory();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['product-category/view', 'id' => $model->id]);
        }
        return $this->render('create', compact('model'));
    }
    
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['product-category/view', 'id' => $model->id]);
        }
        return $this->render('update', compact('model'));
    }
    
    public function actionDelete($id) {
        $this->findModel($id)->softDelete($id);
        return $this->redirect('index');
    }
    
    protected function findModel($id) {
        if ($model = ProductCategory::findOne($id)) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
}
