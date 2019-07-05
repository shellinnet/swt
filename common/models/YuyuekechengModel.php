<?php

namespace common\models;

use Yii;
use common\models\TeacherModel;
/**
 * This is the model class for table "yuyuekecheng".
 *
 * @property integer $kid
 * @property string $kecheng
 * @property integer $teacherid
 * @property integer $keshi
 * @property integer $sum
 * @property string $datetime
 * @property integer $nsum
 */
class YuyuekechengModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yuyuekecheng';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacherid', 'keshi', 'sum', 'nsum'], 'integer'],
            [['datetime'], 'safe'],
            [['kecheng'], 'string', 'max' => 100],
            [['biaoti'], 'string', 'max' => 255],
            [['jieshao'], 'string'],
         
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kid' => 'kid',
            'kecheng' => '课程名',
            'teacherid' => '老师工号',
            'keshi' => '课时',
            'sum' => '预定预约人数',
            'datetime' => '上课时间',
            'nsum' => '实际预约人数',
            'biaoti'=>'标题',
            'jieshao'=>'介绍',
            'img'=>'图片地址'
        ];
    }
// 老师名关联
public function getteacher(){
    return $this->hasOne(TeacherModel::className(),['teacherid'=>'teacherid']);
        }
}
