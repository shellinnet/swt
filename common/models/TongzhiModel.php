<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tongzhi".
 *
 * @property integer $Id
 * @property string $biaoti
 * @property integer $time
 * @property string $neirong
 */
class TongzhiModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tongzhi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_time'], 'string'],
            [['neirong'], 'string'],
            [['biaoti','img','img2'], 'string', 'max' => 255],
            [['topbiaoti'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'biaoti' => '标题',
            'created_time' => '时间',
            'neirong' => '内容',
            'topbiaoti'=>'头部标题',
            'img'=>'图片1地址',
           // 'img2'=>'图片2地址',
        ];
    }
}
