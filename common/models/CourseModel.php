<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use common\models\base\BaseModel;
use common\models\KechengModel;
use common\models\TeacherModel;
use common\models\UsermobileModel;
use common\models\FourtimeModel;
/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $time
 * @property integer $ktime_id
 * @property integer $kid
 * @property integer $total
 * @property integer $tqian
 * @property integer $tsyks
 * @property integer $xueyuanid
 * @property integer $syks
 * @property string $tnote
 * @property integer $status
 * @property string $formid
 * @property integer $jwid
 * @property string $openid
 * @property date $firsttime
 * @property date $endtime
 * @property string $week 

 */
class CourseModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ktime_id', 'kid', 'total', 'tqian', 'tsyks', 'xueyuanid', 'syks', 'status', 'jwid'], 'integer'],
            [['tnote'], 'string'],
            [['time', 'openid', 'week'], 'string', 'max' => 50],
            [['formid'], 'string', 'max' => 100],
            [['firsttime','endtime'],'date'],
        ];
    }

    /**
 * 
 * 
 *  课程名关联
 */
    public function getcourse()
        {
            return $this->hasOne(KechengModel::className(),['keid'=>'kid']);
        }

// 老师名关联
public function getteacher(){
    return $this->hasOne(TeacherModel::className(),['teacherid'=>'tqian']);
        }

//学员名关联
public function getmember(){
    return $this->hasOne(UsermobileModel::className(),['user_id'=>'xueyuanid']);
        }


//时段
public function getshiduan(){
    return $this->hasOne(FourtimeModel::className(),['sid'=>'ktime_id']);
        }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => '时间',
            'ktime_id' => '时段id',
            'kid' => '课程',
            'total' => '总共课时',
            'tqian' => '老师id',
            'tsyks' => '老师剩余课时',
            'xueyuanid' => '学员id',
            'syks' => '已上课时',
            'tnote' => '备注',
            'status' => 'Status',
            'formid' => 'Form ID',
            'jwid' => '教务',
            'openid' => 'Openid',
            'week' => '周期',
            'firsttime'=>'开始日期',
            'endtime'=>'结束日期',
            'teacher.tname'=>'老师名'
           // 'keid.kname'=>'课程名称',
        ];
    }

}
