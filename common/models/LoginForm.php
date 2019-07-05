<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\AdminModel;
use yii\web\Cookie;
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

       public function attributeLabels()
    {
        return [
            'username' => '管理员账号',
            'adminemail' => '管理员邮箱',
            'password' => '管理员密码',
            'repass' => '确认密码',
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
                $this->addError($attribute, '错误的用户名或密码.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()

    {
        if(!$this->user ) return false;
        $this->createSession();
          if($this->rememberMe == 1){
             $this->createCookie();
         } 

      if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
       }
        
      
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
}
