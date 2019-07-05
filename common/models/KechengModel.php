<?php

namespace common\models;
use common\models\TeacherModel;

use Yii;
use common\models\base\BaseModel;

/**
 * This is the model class for table "kecheng".
 *
 * @property integer $id
 * @property integer $keid
 * @property string $kname
 * @property integer $zks
 * @property string $introduce1
 * @property integer $teacherid
 * @property integer $ktime_id
 * @property integer $jwid
 */
class KechengModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecheng';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'zks', 'teacherid', 'keid'], 'integer'],
         
            [['kname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keid' => '课程编号',
            'kname' => '课程名称',
            'zks' => '总课时',
          
            'teacherid' => '老师ID',
        
       
        ];
    }

    // 老师名关联
public function getteacher(){
    return $this->hasOne(TeacherModel::className(),['teacherid'=>'teacherid']);
        }
}
