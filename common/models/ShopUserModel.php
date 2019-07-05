<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shop_user".
 *
 * @property string $userid
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $openid
 * @property integer $created_at
 * @property integer $status
 * @property string $password_hash
 * @property integer $itemid
 * @property string $auth_key
 * @property string $avator
 * @property integer $updated_at
 * @property string $truename
 * @property string $mobile
 * @property string $zhiwei
 * @property string $company
 * @property string $diqu
 * @property string $gumobile
 * @property string $city
 * @property string $liuyan
 */
class ShopUserModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'shiduanid', 'itemid', 'updated_at','teacherid','total','lastkeshi'], 'integer'],
            [['liuyan'], 'string'],
            [['username', 'openid', 'auth_key'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 64],
            [['email'], 'string', 'max' => 100],
            [['password_hash', 'avator', 'truename'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 11],
         
            [['company', 'riqi'], 'string', 'max' => 50],
         
            [['email', 'password'], 'unique', 'targetAttribute' => ['email', 'password'], 'message' => 'The combination of Password and Email has already been taken.'],
            [['username', 'password'], 'unique', 'targetAttribute' => ['username', 'password'], 'message' => 'The combination of Username and Password has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'username' => '学员名',
            'password' => '密码',
            'email' => '邮箱',
            'openid' => 'Openid',
            'created_at' => '入学时间',
            'shiduanid' => '上课时段',
            'password_hash' => 'Password Hash',
            'itemid' => '课程',
            'auth_key' => 'Auth Key',
            'avator' => 'Avator',
            'updated_at' => 'Updated At',
            'truename' => '姓名',
            'mobile' => '手机',
          
            'company' => 'Company',
            'riqi' => '上课日期',
            'total' => '总课时',
            'lastkeshi' => '剩余课时',
            'liuyan' => '留言',
            'teacherid'=>'老师姓名',
        ];
    }
}
