<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gift".
 *
 * @property integer $g_id
 * @property string $g_name
 * @property string $g_img
 * @property double $g_num
 */
class Gift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['g_num'], 'number'],
            [['g_name', 'g_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'g_name' => 'G Name',
            'g_img' => 'G Img',
            'g_num' => 'G Num',
        ];
    }
}
