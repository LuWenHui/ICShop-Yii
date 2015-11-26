<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Notification;

class NotificationController extends Controller
{
	public function actionTest() {
        // $message was just created by the logged in user, and sent to $recipient_id
        //Notification::notify(Notification::KEY_NEW_MESSAGE, $recipient_id, $message->id);
        //
        //// You may also use the following static methods to set the notification type:
        //Notification::warning(Notification::KEY_NEW_MESSAGE, $recipient_id, $message->id);
        //Notification::success(Notification::ORDER_PLACED, $admin_id, $order->id);
        Notification::error(Notification::KEY_NO_DISK_SPACE, Yii::$app->user->identity->id);
        die('end');
	}
}