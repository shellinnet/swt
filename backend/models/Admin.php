<?php

namespace backend\models;
use yii\db\ActiveRecord;
use Yii;

class Admin extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $rememberMe = true;
    public $repass;
    public static function tableName()
    {
        return "{{%admin}}";
    }

    public function attributeLabels()
    {
        return [
            'username' => '管理员账号',
            'adminemail' => '管理员邮箱',
            'password' => '管理员密码',
            'repass' => '确认密码',
        ];
    }

    public function rules()
    {
        return [
            ['username', 'required', 'message' => '管理员账号不能为空', 'on' => ['login', 'seekpass', 'changepass', 'adminadd', 'changeemail']],
            ['password', 'required', 'message' => '管理员密码不能为空', 'on' => ['login', 'changepass', 'adminadd', 'changeemail']],
            ['rememberMe', 'boolean', 'on' => 'login'],
            ['password', 'validatePass', 'on' => ['login', 'changeemail']],
            ['adminemail', 'required', 'message' => '电子邮箱不能为空', 'on' => ['seekpass', 'adminadd', 'changeemail']],
            ['adminemail', 'email', 'message' => '电子邮箱格式不正确', 'on' => ['seekpass', 'adminadd', 'changeemail']],
            ['adminemail', 'unique', 'message' => '电子邮箱已被注册', 'on' => ['adminadd', 'changeemail']],
            ['username', 'unique', 'message' => '管理员已被注册', 'on' => 'adminadd'],
            ['adminemail', 'validateEmail', 'on' => 'seekpass'],
            ['repass', 'required', 'message' => '确认密码不能为空', 'on' => ['changepass', 'adminadd']],
            ['repass', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码输入不一致', 'on' => ['changepass', 'adminadd']],
        ];
    }

    public function validatePass()
    {
        if (!$this->hasErrors()) {
            $data = self::find()->where('username = :user ' , [":user" => $this->username])->one();
            if (is_null($data)) {
                $this->addError("username", "用户名或者密码错误");
            }
            if (!Yii::$app->getSecurity()->validatePassword($this->password, $data->password))
            {
                $this->addError("password", "用户名或者密码错误");
            }
        }
    }

    public function validateEmail()
    {
        if (!$this->hasErrors()) {
            $data = self::find()->where('username = :user and adminemail = :email', [':user' => $this->username, ':email' => $this->adminemail])->one();
            if (is_null($data)) {
                $this->addError("adminemail", "管理员电子邮箱不匹配");        
            }
        }
    }

    public function getAUser()
    {
        return self::find()->where('username = :user', [':user' => $this->username])->one();
    }

    public function login($data)
    {
        $this->scenario = "login";
        if ($this->load($data) && $this->validate()) {
            
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 24*3600 : 0);
            /*$lifetime = $this->rememberMe ? 24*3600 : 0;
            $session = Yii::$app->session;
            session_set_cookie_params($lifetime);
            $session['admin'] = [
                'username' => $this->username,
                'isLogin' => 1,
            ];
            $this->updateAll(['logintime' => time(), 'loginip' => ip2long(Yii::$app->request->userIP)], 'username = :user', [':user' => $this->username]);
            return (bool)$session['admin']['isLogin'];*/
        }
        return false;
    }
    
    public function seekPass($data)
    {
        $this->scenario = "seekpass";
        if ($this->load($data) && $this->validate()) {
         
            $time = time();
            $token = $this->createToken($data['Admin']['username'], $time);
            $mailer = Yii::$app->mailer->compose('seekpass', ['username' => $data['Admin']['username'], 'time' => $time, 'token' => $token]);
            $mailer->setFrom("315711862@qq.com");
            $mailer->setTo($data['Admin']['adminemail']);
            $mailer->setSubject("四物堂-找回密码");
            if ($mailer->send()) {
                return true;
            }
        }
        return false;
    
    }

    public function createToken($username, $time)
    {
        return md5(md5($username).base64_encode(Yii::$app->request->userIP).md5($time));
    }

    public function changePass($data) 
    {
        $this->scenario = "changepass";
        if ($this->load($data) && $this->validate()) {
            return (bool)$this->updateAll(['password' => $this->password], 'username = :user', [':user' => $this->username]);
        }
        return false;
    }

    public function reg($data) 
    {
        $this->scenario = 'adminadd';
        if ($this->load($data) && $this->validate()) {
            $this->password = $this->password;
           // $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function changeEmail($data)
    {
        $this->scenario = "changeemail";
        if ($this->load($data) ) {
            return (bool)$this->updateAll(['adminemail' => $this->adminemail], 'username = :user', [':user' => $this->username]);
        }
        return false;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return '';
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }


}
