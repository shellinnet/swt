<?php

namespace backend\controllers;

use Yii;
use common\models\YuyuekechengModel;
use common\models\YuyuekechengSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\CommonController;
use backend\models\Rbac;
/**
 * YuyuekechengController implements the CRUD actions for YuyuekechengModel model.
 */
class YuyuekechengController extends CommonController
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
     * Lists all YuyuekechengModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YuyuekechengSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YuyuekechengModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionUpload($id){
        return $this->render('upload');
    }
    /**
     * Creates a new YuyuekechengModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new YuyuekechengModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->kid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing YuyuekechengModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
            return $this->redirect(['view', 'id' => $model->kid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing YuyuekechengModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the YuyuekechengModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YuyuekechengModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YuyuekechengModel::findOne($id)) !== null) {
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
