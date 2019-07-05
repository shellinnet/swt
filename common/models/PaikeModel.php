<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\base\BaseModel;
/**
 * This is the model class for table "paike".
 *
 * @property integer $id
 * @property integer $c_id
 * @property string $p_date
 * @property integer $t_id
 * @property integer $s_id
 * @property integer $p_time_id
 * @property integer $p_wei
 * @property integer $p_s_qian
 * @property integer $p_t_qian
 * @property integer $p_quxiao
 * @property string $p_t_beizhu
 */
class PaikeModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paike';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 't_id', 's_id', 'p_time_id', 'p_wei', 'p_s_qian', 'p_t_qian', 'p_quxiao'], 'integer'],
            [['p_date'], 'safe'],
            [['p_t_beizhu'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_id' => '课程ID',
            'p_date' => '上课日期',
            't_id' => '老师ID',
            's_id' => '学员ID',
            'p_time_id' => '上课时段ID',
            'p_wei' => '学员位置',
            'p_s_qian' => '学员是否签到',
            'p_t_qian' => '老师是否签到',
            'p_quxiao' => '位置是否取消',
            'p_t_beizhu' => '老师备注',
        ];
    }
}
