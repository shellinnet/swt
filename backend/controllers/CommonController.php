<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;
use backend\models\LoginForm;

class CommonController extends Controller
{
    public $userId;
    public $userName;
    
    //用户登录验证
     public function beforeAction($action)
    {
     
        if (!parent::beforeAction($action)) {
            return false;
        }
        $controller = $action->controller->id;
     
        $actionName = $action->id;

     
        if (Yii::$app->user->can($controller. '/*')) {
            return true;
        }
        if (Yii::$app->user->can($controller. '/'. $actionName)) {
            return true;
        }


        throw new \yii\web\UnauthorizedHttpException('对不起，您没有访问'. $controller. '/'. $actionName. '的权限');
        // return true;
    }

    public function init()
    {
        parent::init();
        //第一步获取session是否存在
        if(!$this->getUserSession()){
            //如果session不存在的话 , 我们判断cookie是否存在
            //有的话通过cookie生成session
            $loginForm = new LoginForm();
            $loginForm->loginByCookie();
            $this->getUserSession();
        }

        $this->userId = Yii::$app->session->get(LoginForm::BACKEND_ID);
        $this->userName = Yii::$app->session->get(LoginForm::BACKEND_USERNAME);
    }


    /**
     * 读取session并赋值给user
    */
    private function getUserSession()
    {
        $session = Yii::$app->session;
        $this->userId = $session->get(LoginForm::BACKEND_ID);
        

        //$this->expressionUserId='2';
        $this->userName = $session->get(LoginForm::BACKEND_USERNAME);

        return $this->userId;
    }
}