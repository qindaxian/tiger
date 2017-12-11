<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $sort
 * @property integer $visibility
 */
class Cat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort', 'visibility'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'sort' => 'Sort',
            'visibility' => 'Visibility',
        ];
    }

    public static function catFind()//模型  
    {  
        $cateFind = new Cat;  
        // 按照归属类排序  
        $cateInfo = $cateFind->findAll(array(  
            'select' => array('id', 'name', 'parent_id'),  
            'order' => 'id'));  
        foreach ($cateInfo as $k => $v) {  
            $cateInfo[$k] = $cateInfo[$k]->attributes;  
        }  
        return $cateInfo;  
    }
}
