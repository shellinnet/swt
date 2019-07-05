<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Admin;
use backend\controllers\CommonController;
use backend\models\Rbac;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            // 'error' => [
            //     'class' => 'yii\web\ErrorAction',
            // ],
             'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    

    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
              
  
    
        $this->layout = 'login.php';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
              
        $model = new LoginForm(); 

         // if(Yii::$app->request->isPost) {
         //   $post=Yii::$app->request->post();
         //   if($model->login()){
         //        return $this->goBack();
           //  }
        //}
        //  return $this->render('login', ['model' => $model]);   
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else{
            return $this->render('login', ['model' => $model]);
        }
        
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
public function actionError()
    {
     
        return $this->render('error');
    }

}
