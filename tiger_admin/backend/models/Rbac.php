<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rbac".
 *
 * @property integer $id
 * @property string $rbac_route
 */
class Rbac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rbac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rbac_route'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rbac_route' => 'Rbac Route',
        ];
    }
}
