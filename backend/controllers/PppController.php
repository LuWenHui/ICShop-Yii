<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\ServerErrorHttpException;
use yii\web\Response;
use idarex\pingppyii2\Channel;
use idarex\pingppyii2\ChargeForm;

class PppController extends Controller {
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if ($action->id == 'pingpp-hooks') {
            // 当用户完成交易后 Ping++ 会以 POST 方式把数据发送到你的 hook 地址
            // 所以这时候需要临时关闭掉 Yii 的 CSRF 验证
            Yii::$app->controller->enableCsrfValidation = false;
        }
    
        return parent::beforeAction($action);
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['pay'],  // in a controller
                // if in a module, use the following IDs for user actions
                // 'only' => ['user/view', 'user/index']
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
                //'languages' => [
                //    'en',
                //    'de',
                //],
            ],
        ];
    }

    public function actions()
    {
        return [
            // ...
            'pingpp-hooks' => [
                'class' => '\idarex\pingppyii2\HooksAction',
                'pingppHooksComponentClass' => 'backend\components\PingppHooks',
                'publicKeyPath' => '@common/config/pingpp_rsa_public_key.pem',
            ],
        ];
    }
    
    public function actionPay() {
        $chargeForm = new ChargeForm();
        $chargeForm->order_no = '123456789';
        $chargeForm->amount = '100';
        /**
         * @see Channel
         */
        $chargeForm->channel = Channel::ALIPAY_PC_DIRECT;
        $chargeForm->currency = 'cny';
        $chargeForm->client_ip = Yii::$app->getRequest()->userIP;
        $chargeForm->subject = 'Your Subject';
        $chargeForm->body = 'Your body';
        $chargeForm->extra = [
            'success_url' => Url::to(['alipay-success-callback'], true),
        ];
        
        if ($response = $chargeForm->create()) {
            return $response->__toArray(true);
        } elseif ($chargeForm->hasErrors()) {
            var_dump($chargeForm->getErrors());
        } else {
            throw new ServerErrorHttpException();
        }
    }
    
    public function actionGate() {
        return $this->render('gate');
    }
    
    public function actionAlipaySuccessCallback() {
        var_dump(file_get_contents('php://input'));
    }
}
