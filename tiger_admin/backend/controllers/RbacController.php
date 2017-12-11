<?php

namespace backend\controllers;

use yii;
use app\models\Role;
use app\models\Rbac;
use app\models\Admin;
use app\models\Role_Rbac;
use app\models\Admin_Role;

/**
 * 权限
 */
class RbacController extends CommonController
{
	/** 用户角色添加 */
    public function actionAdd()
    {
    	$data = yii::$app->request->post();
    	if (empty($data)) {

    		// 展示添加角色

	    	$data['role'] = Role::find()->asArray()->all();
			$data['admin'] = Admin::find()->asArray()->all();

    	    return $this->render('add',$data);

	   	}else{

	   		//处理添加角色
	   		$admin_role = new Admin_Role;
	   		$admin_role->admin_id = intval($data['admin_id']);
	   		$admin_role->role_id = intval($data['role_id']);

	   		if ($admin_role->save()) {
	   			return $this->redirect(['rbac/list']);
	   		}

	   	}


    }

    /** 用户角色展示操作 */
    public function actionList()
    {
    	//用户
		$admin = Admin::find()->select('admin_role.id,username')->innerJoin('admin_role','admin.id = admin_role.admin_id')->orderBy('admin.id ASC')->asArray()->all();

		//角色
    	$role = Role::find()->select('admin_role.id,role_name')->innerJoin('admin_role','role.id = admin_role.role_id')->orderBy('role.id ASC')->asArray()->all();

    	//重组
    	$data = [];
    	foreach ($admin as $k => $v) {
    		foreach ($role as $key => $val) {
    			if ($v['id'] == $val['id']) {
    				$data[$k]['id'] = $v['id'];
    				$data[$k]['username'] = $v['username'];
    				$data[$k]['role_name'] = $val['role_name'];
    			}
    		}
    	}

    	//展示
    	$data['data'] = json_encode($data);

        return $this->render('list',$data);
    }

    /** 角色添加 */
    public function actionRole_add()
    {

    	$data = yii::$app->request->post();

    	if (empty($data)) {

        	//展示角色添加页面

        	return $this->render('role_add');

    	}else{

    		//处理添加

    		$role = new Role;

    		$role->role_name = $data['role_name'];

    		if($role->save()){
    			return $this->redirect(['rbac/role_list']);
    		}

    	}


    }

    /** 角色展示操作 */
    public function actionRole_list()
    {

    	$data['data'] = json_encode(Role::find()->asArray()->all());

        return $this->render('list',$data);
    }

    /** 权限添加 */
    public function actionRbac_add()
    {
        $data = yii::$app->request->post();

    	if (empty($data)) {


        	//展示权限添加页面
    		$data['role'] = Role::find()->asArray()->all();
        	return $this->render('rbac_add', $data);

    	}else{

    		//添加权限

    		$rbac = new Rbac;

    		$rbac->rbac_route = $data['rbac_route'];

    		if($rbac->save()){

    			//添加权限角色关联表

    			$rbac_id = yii::$app->db->getLastInsertID();

    			$role_rbac = new Role_Rbac;

    			$role_rbac->role_id = intval($data['role_id']);
    			$role_rbac->rbac_id = intval($rbac_id);

    			if ($role_rbac->save()) {

    				return $this->redirect(['rbac/rbac_list']);

    			}

    		}

    	}


    }

    /** 权限展示操作 */
    public function actionRbac_list()
    {
    	//权限
    	$rbac = Rbac::find()->select('role_rbac.id,rbac_route')->innerJoin('role_rbac','rbac.id=role_rbac.rbac_id')->orderBy('rbac.id ASC')->asArray()->all(); //联查

    	//角色
    	$role = Role::find()->select('role_rbac.id,role_name')->innerJoin('role_rbac', 'role.id = role_rbac.role_id')->orderBy('role.id ASC')->asArray()->all();

    	//数据重组
    	$data = [];
    	foreach ($rbac as $k => $v) {
    		foreach ($role as $key => $val) {

    			if ($v['id'] == $val['id']) {
    				$data[$k]['id'] = $v['id'];
    				$data[$k]['rbac_route'] = $v['rbac_route'];
    				$data[$k]['role_name'] = $val['role_name'];
    			}
    		}
    	}

		$data['data'] = json_encode($data);
        return $this->render('rbac_list',$data);
    }
}
