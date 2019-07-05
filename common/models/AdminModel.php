<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use common\models\base\BaseModel;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class AdminModel extends BaseModel implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $repass;
    public $loginname;
    public $rememberMe = true;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         TimestampBehavior::className(),
    //     ];
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
              [['m_tel', 'm_qx_id', 'created_at', 'role', 'updated_at'], 'integer'],
            [['m_beizhu'], 'string'],
            [['m_weixin', 'm_name', 'm_rzdate', 'username', 'password', 'password_hash', 'adminemail'], 'string', 'max' => 255],
            [['m_sex'], 'string', 'max' => 10],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }


     public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'm_name'=>'管理员姓名',
            'm_weixin'=>'微信名',
             'm_sex' => '性别',
             'm_rzdate' => '入职时间',
              'm_tel'=>'管理员电话',
            'm_beizhu'=>'备注',
            'm_qx_id' => '权限ID',
            'username' => '管理员名',
             'password' => 'Password',
            'password_hash' => 'Password Hash',
            'created_at' => '创建时间',
            'status' => '权限',
                 'role' => '角色',
            'adminemail' => '邮箱',
            'auth_key' => '自动登录Key',
            'updated_at' => '更新时间',                     
      
        ];
    }

        public function validatePass()
    {
        if (!$this->hasErrors()) {
            $loginname = "username";
         
            $data = self::find()->where($loginname.' = :loginname', [':loginname' => $this->loginname])->one();
            if (is_null($data)) {
                $this->addError("password", "用户名或者密码错误");
            }
            if (!Yii::$app->getSecurity()->validatePassword($this->password, $data->password))
            {
                $this->addError("password", "用户名或者密码错误");
            }
        }
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['userid' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
       // return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
       // return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return Yii::$app->security->validatePassword($password, $this->password_hash);
        return $this->password === $password;
       // return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        //$this->password_hash = Yii::$app->security->generatePasswordHash($password);
         $this->password=Yii::$app->$password;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
