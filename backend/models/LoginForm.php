<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\AdminModel;
use yii\web\Cookie;
//use backend\models\Admin;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;
     const BACKEND_ID = 'backend_id';
     const BACKEND_USERNAME = 'backend_username';
     const BACKEND_COOKIE = 'backend_remember';
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    public function attributeLabels(){
        return [
            'username' => '用户名',
            'password' => '密码',
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或密码不正确.');
            }
        }
        // if (!$this->hasErrors()) {
        //     $data = self::find()->where('username = :user ' , [":user" => $this->username])->one();
        //     if (is_null($data)) {
        //         $this->addError("username", "用户名或者密码错误");
        //     }
        //     if (!Yii::$app->getSecurity()->validatePassword($this->password, $data->password))
        //     {
        //         $this->addError("password", "用户名或者密码错误");
        //     }
        // }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        // if ($this->validate()) {
        //     return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 24 * 3600 : 0);
        // }
        
        // return false;
         if(!$this->user ) return false;
        $this->createSession();

        // if($this->rememberMe == 1){
        //     $this->createCookie();
        // }
        //return true;
         Yii::$app->user->login($this->getUser(), $this->rememberMe ? 24 * 3600 : 0);
    }

        private function createSession()
    {
        //第一步生成session
        $session = Yii::$app->session;
        $session->set(self::BACKEND_ID , $this->user['id']);
        $session->set(self::BACKEND_USERNAME , $this->user['username']);
    }

    private function createCookie()
    {
        $cookie = new Cookie();
        $cookie->name = self::BACKEND_COOKIE;
        $cookie->value = [
            'id' => $this->user['id'],
            'username' => $this->user['username']
        ];
        //cookie保存7天
        $cookie->expire = time() + 60 * 60 * 24 * 7;
        $cookie->httpOnly = true;

        Yii::$app->response->cookies->add($cookie);
    }

     private function updateUserStatus()
    {
        $user = AdminModel::findOne($this->user['id']);
        $user->login_update = Yii::$app->request->getUserIP();
        $user->login_date = time();
        return $user->save();
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = AdminModel::findByUsername($this->username);
        }

        return $this->_user;

    }

 /**
     * 通过cookie登录
    */
    public function loginByCookie()
    {
        $cookies = Yii::$app->request->cookies;
        if($cookies->has(self::BACKEND_COOKIE))
        {
            $userData = $cookies->getValue(self::BACKEND_COOKIE);
            if(isset($userData['id']) && isset($userData['username'])){
                $this->user = User::find()->where(['username' => $userData['username'] , 'id' => $userData['id'] , 'status' => 10])->asArray()->one();
                if($this->user){
                    $this->createSession();
                    return true;
                }
            }
        }
        return false;
    }


     /**
     * 退出登录
    */
    public static function logout()
    {
       $session = Yii::$app->session;
        $session->remove(self::BACKEND_ID);
        $session->remove(self::BACKEND_USERNAME);
        $session->destroy();

        $cookies = Yii::$app->request->cookies;
        //可能存在cookie
        if($cookies->has(self::BACKEND_COOKIE))
        {
            $rememberCookie = $cookies->get(self::BACKEND_COOKIE);
            Yii::$app->response->cookies->remove($rememberCookie);
        }
        return true;
    }
}
