<?php

namespace backend\controllers;

use yii;

use backend\controllers\CommonController;
 // 默认首页
class IndexController extends CommonController
{

    public function actionIndex()
    {
    	
        return $this->render('index');
    }

}
