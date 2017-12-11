<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role_rbac".
 *
 * @property integer $id
 * @property integer $role_id
 * @property integer $rbac_id
 */
class Role_Rbac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_rbac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'rbac_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'rbac_id' => 'Rbac ID',
        ];
    }
}
