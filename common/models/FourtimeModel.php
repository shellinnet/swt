<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fourtime".
 *
 * @property integer $id
 * @property string $shiduan
 */
class FourtimeModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fourtime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shiduan'], 'string', 'max' => 255],
             [['sid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sid'=>'时段id',
            'shiduan' => '上课时段',
        ];
    }
    public static function getAllFourtime(){
   // $fourtime=['0'=>'10：00-12:00'];
    $res=self::find()->asArray()->all();
    
    if($res){
        foreach($res as $k=>$list){
            $fourtime[$list['sid']]=$list['shiduan'];
        }
    }
    return $fourtime;
}
}
