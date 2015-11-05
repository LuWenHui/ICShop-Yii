<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\captcha\CaptchaAction;
use backend\models\AdminUserLoginForm;

class UserController extends Controller {
    public function actions() {
        return [
            'captcha' => [
                'class' => CaptchaAction::className(),
                'transparent' => true,
                'foreColor' => '#ccc',
            ],
        ];
    }

    public function actionLogin() {
        $adminUserLoginForm = Yii::createObject(AdminUserLoginForm::className());
        if ($adminUserLoginForm->load(Yii::$app->request->post()) && $adminUserLoginForm->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', compact('adminUserLoginForm'));
        }
    }
}