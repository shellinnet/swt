<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use common\models\base\BaseModel;

/**
 * This is the model class for table "course_fen".
 *
 * @property integer $id
 * @property integer $c_leibie
 * @property integer $cf_id
 * @property string $cf_name
 */
class CourseFenModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_fen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_leibie', 'cf_id'], 'integer'],
            [['cf_name'], 'string', 'max' => 255],
        ];
    }

/**
 * 
 * 
 *  课程名关联
 */
    public function getcourse_lei()
        {
            return $this->hasOne(CourseLeiModel::className(),['c_leibie'=>'c_leibie']);
        }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_leibie' => '课程类别',
            'cf_id' => '分类id',
            'cf_name' => '分类名称',
          //  'course-lei.c_leiname'=>'课程名称',
        ];
    }
}
