<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "usermobile".
 *
 * @property string $userid
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $user_id
 * @property string $openid
 * @property integer $created_at
 * @property integer $shiduanid
 * @property string $password_hash
 * @property integer $itemid
 * @property string $auth_key
 * @property string $avator
 * @property integer $updated_at
 * @property string $truename
 * @property string $mobile
 * @property integer $teacherid
 * @property string $tname
 * @property integer $adminid
 * @property string $adminname
 * @property integer $lastkeshi
 * @property string $riqi
 * @property integer $total
 * @property string $city
 * @property string $liuyan
 * @property string $formId
 */
class UsermobileModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usermobile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'shiduanid', 'itemid', 'updated_at', 'teacherid', 'adminid', 'lastkeshi', 'total'], 'integer'],
            [['riqi'], 'safe'],
            [['liuyan'], 'string'],
            [['username', 'openid', 'auth_key'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 64],
            [['email', 'tname', 'adminname'], 'string', 'max' => 100],
            [['password_hash', 'avator', 'truename', 'formId'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 11],
            [['city'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => '学员id',
            'username' => '学员名',
            'password' => 'Password',
            'email' => '邮箱',
            'user_id' => 'User ID',
            'openid' => 'Openid',
            'created_at' => 'Created At',
            'shiduanid' => '时段id',
            'password_hash' => 'Password Hash',
            'itemid' => 'Itemid',
            'auth_key' => 'Auth Key',
            'avator' => 'Avator',
            'updated_at' => 'Updated At',
            'truename' => '姓名',
            'mobile' => '手机',
            'teacherid' => 'Teacherid',
            'tname' => '老师姓名',
            'adminid' => 'Adminid',
            'adminname' => 'Adminname',
            'lastkeshi' => 'Lastkeshi',
            'riqi' => 'Riqi',
            'total' => 'Total',
            'city' => 'City',
            'liuyan' => 'Liuyan',
            'formId' => 'Form ID',
            'nickname'=>'微信名',
        ];
    }
}
