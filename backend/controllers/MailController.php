<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class MailController extends Controller
{
	public function actionSend() {
		$activeAccountLink = Url::to(['/', 'token' => Yii::$app->security->generateRandomString()], true);
		//\yii\helpers\VarDumper::dump($activeAccountLink);die;
		$flag = Yii::$app->mailer->compose(['html' => 'active-account-html', 'text' => 'active-account-text'], ['activeAccountLink' => $activeAccountLink])
			->setFrom('postmaster@sandbox82dfe3fbf0614ea28b17eadd5b0818f8.mailgun.org')
			->setTo('dear.lin@live.com')
			->setSubject('激活账户代码')
			->send();
		var_dump($flag);
		die;
	}
}