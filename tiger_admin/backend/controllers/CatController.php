<?php
/**
 * 直播分类控制器
 */
namespace backend\controllers;

use yii;
use app\models\Cat;

class CatController extends CommonController
{

	public function actionIndex()  
	{  
		
	}

	/** [actionAdd 添加分类] */
    public function actionAdd()
    {

    	if ($_POST) {
    			
    		// 接收数据
    		$data = yii::$app->request->post();
    		// 入库
    		$cat = new Cat;
    		$cat->name = $data['name'];
    		$cat->parent_id = $data['parent_id'];
    		$cat->sort = $data['sort'];
    		$res = $cat->save();

    		// 入库成功跳转列表页
    		$this->redirect(['show']);

    	}else{

    		// 获取全部分类数据
			$arr = Cat::find()->asArray()->all();
		    //获取常规分类数组  
		    $cateInfo = $this->actionGetCatInfo($arr);  

	        return $this->render('add',['cateInfo' => $cateInfo]);
    	}

    }

    /** [actionShow 分类展示页面] */
    public function actionShow()
    {
    	// 获取全部分类数据
		$data = Cat::find()->asArray()->all();
	   	 
        return $this->render('show',['data' => json_encode($data)]);
    }


    /**
     * [actionGetCatInfo 无限极分类递归处理]
     * @param  [array]  $arr  [分类数据]
     * @param  integer $p_id [父级id]
     * @param  integer $lev  [分类等级]
     * @return [array]        [description]
     */
    public function actionGetCatInfo($arr,$p_id=0,$lev=1)  
	{  
    
	    $subs = array(); // 子孙数组
		    foreach($arr as $v) {
		        if($v['parent_id'] == $p_id) {
		            $v['lev'] = $lev;
		            $subs[] = $v; // 举例说找到array('id'=>1,'name'=>'安徽','parent'=>0),
		            $subs = array_merge($subs,$this->actionGetCatInfo($arr,$v['id'],$lev+1));
		        }
		    }
	    return $subs;

	}

	public function actionEdit()
	{

		echo json_encode(1);die;

	}

	



}
