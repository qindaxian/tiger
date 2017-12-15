<?php

namespace backend\controllers;

use yii;
use yii\web\Controller;
use app\models\Gift; // 用户表


class GiftController extends Controller
{
    public $enableCsrfValidation = false; // post 提交时 关闭框架自带的防某种攻击

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        //用户
        $Gift = Gift::find()->select('id,g_name,g_img,g_num')->orderBy('id ASC')->asArray()->all();
        $data['data'] = json_encode($Gift);
        return $this->render('list',$data);
    }

    public function actionAdd()
    {
        return $this->render('add');
    }

    // 添加,展示.删除
    public function actionAa()
    {

        $model = new Gift();
        $post = Yii::$app->request->post();
//        var_dump($post);exit;

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
            Gift::findOne($post['id'])->delete(); //删除主键为$id变量值的数据记录；
            return true;
        }
        //修改
        $res = $model->find()->where(['id'=>$post['id']])->one();
        $res->g_name = $post['g_name'];
        $res->g_img  = $post['g_img'];
        $res->g_num  = $post['g_num'];
        $res->save();
        return true;

    }
}
