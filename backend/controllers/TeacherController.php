<?php

namespace backend\controllers;

use Yii;
use common\models\TeacherModel;
use common\models\TeacherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Rbac;
use backend\controllers\CommonController;
use common\models\KechengModel;

/**
 * TeacherController implements the CRUD actions for TeacherModel model.
 */
class TeacherController extends CommonController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TeacherModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeacherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TeacherModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

     public function actionRegister()
    {
        return $this->render('register');
    }

    public function actionMain()
    {
        return $this->render('main');
    }
    public function actionMain2()
    {
        return $this->render('main2');
    }
     public function actionXiang()
    {
        return $this->render('xiang');
    }

      public function actionAddkecheng()
    {
        return $this->render('addkecheng');
    }

       public function actionXiu()
    {
        return $this->render('xiu');
    }

      public function actionTongji()
    {
        return $this->render('tongji');
    }
      public function actionAddok()
    {
        return $this->render('addok');
    }
     public function actionTeachermsg()
    {
        return $this->render('teachermsg');
    }
     public function actionXiugai()
    {
        return $this->render('xiugai');
    }
    public function actionXiuok()
    {
        return $this->render('xiuok');
    }
       public function actionKechengok(){
        return $this->render('kechengok');
    }
    /**
     * Creates a new TeacherModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeacherModel();
    
     
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view', 'id' => $model->tid]);
        } else {
            return $this->render('create', [
                'model' => $model,
                
            ]);
        }
    }

    /**
     * Updates an existing TeacherModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TeacherModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionKeshi(){
        return $this->render('keshi');
    }

     public function actionTeachershi(){
        return $this->render('teachershi');
    }

     public function actionTeachercourse(){
        return $this->render('teachercourse');
    }
     public function actionKcdelete(){
        return $this->render('kcdelete');
    }

    public function actionDelke(){
        return $this->render('delke');
    }
 public function actionTeacherclose(){
        return $this->render('teacherclose');
    }
    /**
     * Finds the TeacherModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TeacherModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TeacherModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionAssign($id)
    {
        $id = (int)$id;
        if (empty($id)) {
            throw new \Exception('参数错误');
        }
        $admin = Admin::findOne($id);
        if (empty($admin)) {
            throw new \yii\web\NotFoundHttpException('admin not found');
        }

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $children = !empty($post['children']) ? $post['children'] : [];
            if (Rbac::grant($id, $children)) {
                Yii::$app->session->setFlash('info', '授权成功');
            }
        }

        $auth = Yii::$app->authManager;
        $roles = Rbac::getOptions($auth->getRoles(), null);
        $permissions = Rbac::getOptions($auth->getPermissions(), null);
        $children = Rbac::getChildrenByUser($id);

        return $this->render('_assign', ['children' => $children, 'roles' => $roles, 'permissions' => $permissions, 'admin' => $admin->username]);
    }


}
