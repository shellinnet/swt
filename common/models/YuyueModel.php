<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yuyue".
 *
 * @property integer $id
 * @property integer $kid
 * @property string $name
 * @property string $mobile
 * @property string $time
 * @property integer $sid
 */
class YuyueModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yuyue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kid', 'sid'], 'integer'],
            [['time'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kid' => '预约的课程',
            'name' => '客户名',
            'mobile' => '手机',
            'time' => '预约时间',
            'sid' => 'Sid',
        ];
    }

}
