<?php

namespace backend\controllers;

use app\models\Admin; // 用户表
use yii;

class AnchorController extends \yii\web\Controller
{
    public $enableCsrfValidation = false; // post 提交时 关闭框架自带的防某种攻击

    // 主博列表
    public function actionIndex()
    {
        //用户
        $admin = Admin::find()->select('id,username,password,anchor,state,sealtime')->where(['state'=>1,'anchor'=>1])->orderBy('id ASC')->asArray()->all();
        $data['data'] = json_encode($admin);

        return $this->render('index',$data);
    }
    public function actionAa()
    {

        $model = new Admin();
        $post = Yii::$app->request->post();
        //添加
        if (!empty($post['oper']) && $post['oper'] == 'add'){
            unset($post['oper']);
            unset($post['id']);
            $keys = array_keys($post);
            foreach ($keys as $k => $v) {
                $model->$v =$post[$v];
            }
            $model->save();
            return true;
        }
        // 删除
        if (!empty($post['oper']) && $post['oper'] == 'del'){
            Admin::findOne($post['id'])->delete(); //删除主键为$id变量值的数据记录；
            return true;
        }
        //修改
        $res = $model->find()->where(['id'=>$post['id']])->one();
        $res->username = $post['username'];
        $res->anchor   = $post['anchor'];
        $res->state   = $post['state'];
        $res->save();
        return true;

    }

}

