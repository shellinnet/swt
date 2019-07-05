<?php
namespace frontend\models;

use yii\base\Model;
use common\models\UserModel;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username','filter','filter'=> 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\UserModel', 'message' => '该用户已被使用！'],
            ['username', 'string', 'min' => 3, 'max' => 16],
            ['username', 'match','pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u','message'=>'用户名由字母，汉字，数字，下划线组成，且不能以数字和下划线开头。'],



            [['password','repassword'], 'required'],
            [['password','repassword'], 'string', 'min' => 3],
            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>'两次输入的密码不一致！'],

            ['verifyCode', 'captcha'], //验证码
        ];
    }

    public function attributeLabels()
    {
       return [
           'username'=>'用户名',
        
           'password'=>'密码',
           'repassword'=>'重复密码',
           'verifyCode'=>'验证码',
       ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new UserModel();
        $user->username = $this->username;
       
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
