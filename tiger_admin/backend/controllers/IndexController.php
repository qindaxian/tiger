<?php

namespace backend\controllers;

use yii;

use backend\controllers\CommonController;

class IndexController extends CommonController
{

    public function actionIndex()
    {
    	

        return $this->render('index');
    }

}
