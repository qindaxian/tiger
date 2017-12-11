<?php

namespace backend\controllers;

use yii;
use backend\models\LoginForm;

use yii\web\Controller;

use app\models\Admin;

class LoginController extends Controller
{

	public $layout = false;

	/** 登录 */
    public function actionLogin()
    {
        //接值
    	$data = yii::$app->request->post();

        if (empty($data)) {

            //渲染数据

    		$model['model'] = new LoginForm;

        	return $this->render('login',$model);

    	}else{

            //判断是否正确

            $admin = Admin::find()->where(['username' => $data['LoginForm']['username'], 'password' => md5($data['LoginForm']['password'])])->asArray()->one();

            if (!empty($admin)) {

                Yii::$app->session['admin_id'] = ['id'=>$admin['id'],'admin_name'=>$admin['username']];

                return $this->redirect(['index/index']);

            }else{
                return $this->redirect(['index/index']);
                // echo "<script>alert('账号或密码错误');location.href='?index.php?r=login/login'</script>";die;

            }

    	}
    }

    /** 注册 */
    public function actionRegister()
    {
        //接值
        $data = yii::$app->request->post();

        if (empty($data)) {
            //渲染视图

            $model['model'] = new LoginForm;

            return $this->render('register',$model);

        }else{
            //处理注册

            $info = Admin::find()->where(['username' => $data['LoginForm']['username'], 'password' => md5($data['LoginForm']['password'])])->asArray()->one();
            if (empty($info)) {

                //注册

                $admin = new Admin;

                $admin->username = $data['LoginForm']['username'];
                $admin->password = md5($data['LoginForm']['password']);

                if ($admin->save()) {
                    // $id = Yii::$app->db->getLastInsertID();

                    return $this->redirect(['login/login']);

               }

            }else{

                //注册过
                echo "<script>alert('账号已经被注册');location.href=history.back();</script>";die;

            }

        }

    }





}
