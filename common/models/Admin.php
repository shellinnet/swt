<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $m_weixin
 * @property string $m_name
 * @property string $m_sex
 * @property string $m_rzdate
 * @property integer $m_tel
 * @property string $m_beizhu
 * @property integer $m_qx_id
 * @property string $username
 * @property string $password
 * @property string $password_hash
 * @property integer $created_at
 * @property integer $status
 * @property integer $role
 * @property string $avatar
 * @property string $auth_key
 * @property integer $updated_at
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['m_tel', 'm_qx_id', 'created_at', 'status', 'role', 'updated_at'], 'integer'],
            [['m_beizhu'], 'string'],
            [['m_weixin', 'm_name', 'm_rzdate', 'username', 'password', 'password_hash', 'avatar'], 'string', 'max' => 255],
            [['m_sex'], 'string', 'max' => 10],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'm_weixin' => 'M Weixin',
            'm_name' => 'M Name',
            'm_sex' => 'M Sex',
            'm_rzdate' => 'M Rzdate',
            'm_tel' => 'M Tel',
            'm_beizhu' => 'M Beizhu',
            'm_qx_id' => 'M Qx ID',
            'username' => 'Username',
            'password' => 'Password',
            'password_hash' => 'Password Hash',
            'created_at' => 'Created At',
            'status' => 'Status',
            'role' => 'Role',
            'avatar' => 'Avatar',
            'auth_key' => 'Auth Key',
            'updated_at' => 'Updated At',
        ];
    }
}
