<?php

namespace common\models;
use common\models\KechengModel;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $tid
 * @property integer $teacherid
 * @property string $t_weixin
 * @property integer $teacherlei
 * @property string $tname
 * @property string $t_sex
 * @property string $t_rzdate
 * @property integer $t_telephone
 * @property string $t_cydate
 * @property integer $kcid
 * @property integer $skrq
 * @property integer $sdid
 * @property integer $xyid
 * @property string $t_beizhu
 * @property string $password
 * @property string $password_hash
 * @property integer $created_at
 * @property integer $update_at
 */
class TeacherModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacherid', 'teacherlei', 't_telephone', 'kcid', 'skrq', 'sdid', 'xyid', 'created_at', 'update_at','zks','ysks'], 'integer'],
            [['t_weixin', 'tname', 't_rzdate', 't_cydate', 't_beizhu', 'password', 'password_hash'], 'string', 'max' => 255],
            [['t_sex'], 'string', 'max' => 10],
            [['kname'], 'string', 'max' => 50],
        ];
    }
   public function getkecheng(){
      return $this->hasOne(KechengModel::className(),['teacherid'=>'teacherid']);
        }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tid' => 'Tid',
            'teacherid' => '老师工号',
            't_weixin' => '微信',
            'teacherlei' => '分类',
            'tname' => '姓名',
            't_sex' => '性别',
            't_rzdate' => '入职日期',
            't_telephone' => '电话',
            't_cydate' => '从业时间',
            'kcid' => '课程id',
            'skrq' => '上课日期',
            'sdid' => '上课时段',
            'xyid' => '学员名',
            't_beizhu' => '老师备注',
            'password' => '密码',
            'password_hash' => 'Password Hash',
            'created_at' => '创建时间',
            'update_at' => '更新时间',
            'zks'=>'总课时',
            'ysks'=>'已上课时',
          
        ];
    }

     public static function getAllTeachers(){
   // $fourtime=['0'=>'10：00-12:00'];
    $res=self::find()->asArray()->all();
    
    if($res){
        foreach($res as $k=>$list){
            $teacher[$list['teacherid']]=$list['tname'];
        }
    }
    return $teacher;
}


}
