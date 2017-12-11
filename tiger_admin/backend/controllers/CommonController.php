<?php

namespace backend\controllers;

use yii;

use yii\web\Session;

use yii\helpers\Url;

/** 公共模型 */
class CommonController extends \yii\web\Controller
{

	/** 公共防非法登录 */
    public function init()
    {
    	$admin = Yii::$app->session['admin_id'];

    	if (empty($admin)) {
    		return $this->redirect(['/login/login']);die;
    		// return Yii::app()->runController('login/login');
    		// return Yii::$app->getResponse()->redirect(['login/login']);
    	}

    }

}
