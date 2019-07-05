<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\base\BaseModel;
/**
/**
 * This is the model class for table "student".
 *
 * @property integer $s_id
 * @property string $s_weixin
 * @property string $s_name
 * @property string $s_sex
 * @property string $s_state
 * @property integer $c_id
 * @property integer $t_id
 * @property integer $s_telephone
 * @property string $s_note
 * @property integer $s_ctimes
 * @property string $t_beizhu
 * @property integer $c_leibie
 * @property string $password
 * @property string $password_hash
 * @property integer $created_at
 * @property integer $update_at
 * @property string $l_lei_id
 */
class StudentModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 't_id', 's_telephone', 's_ctimes', 'c_leibie', 'created_at', 'update_at'], 'integer'],
            [['s_weixin', 's_name', 's_state', 's_note', 't_beizhu', 'password', 'password_hash', 'l_lei_id'], 'string', 'max' => 255],
            [['s_sex'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_id' => 'S ID',
            's_weixin' => '微信名',
            's_name' => '姓名',
            's_sex' => '性别',
            's_state' => '状态',
            'c_id' => '所学课程ID',
            't_id' => '老师ID',
            's_telephone' => '联系电话',
            's_note' => '其它信息',
            's_ctimes' => '课程签到次数',
            't_beizhu' => '老师备注',
            'c_leibie' => '课程类别',
            'password' => '密码',
            'password_hash' => '加密密码',
            'created_at' => '创建时间',
            'update_at' => '更新时间',
            'l_lei_id' => '学员类别ID',
        ];
    }
}
