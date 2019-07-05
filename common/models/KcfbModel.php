<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kcfb".
 *
 * @property integer $Id
 * @property string $biaoti
 * @property integer $time
 * @property string $neirong
 * @property string $head
 */
class KcfbModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kcfb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'date'],
            [['neirong', 'neirong2'], 'string'],
            [['biaoti'], 'string', 'max' => 255],
            [['img1','img2','img3','img4'], 'string', 'max' => 150],
            [['kcname','kcname2','kcname3','kcname4'], 'string', 'max' => 32],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'biaoti' => '标题',
            'time' => '发布时间',
            'neirong2' => '内容',
            'neirong' => '内容',
            'img1'=>'页面头部图片地址',
            'img2'=>'简介1图片地址',
            'img3'=>'简介2图片地址',
            'img4'=>'简介3图片地址',
            'kcname'=>'课程名',
            'kcname2'=>'课程名2',
            'kcname3'=>'课程名3',
            'kcname4'=>'课程名4',         
        ];
    }
}
