<?php

namespace backend\controllers;

use Yii;
use common\models\UsermobileModel;
use common\models\UsermobileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\CommonController;
use backend\models\Rbac;
/**
 * UsermobileController implements the CRUD actions for UsermobileModel model.
 */
class UsermobileController extends CommonController
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
     * Lists all UsermobileModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsermobileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionRegister()
    {
        return $this->render('register');
    }

    public function actionVipregister()
    {
        return $this->render('vipregister');
    }
  public function actionMain()

    {
        
        return $this->render('main');
    }
     public function actionXiang()
    {
        return $this->render('xiang');
    }
     public function actionXiu()
    {
        return $this->render('xiu');
    }
    public function actionDel()
    {
        return $this->render('del');
    }
     public function actionChange()
    {
        return $this->render('change');
    }
      public function actionChangeok()
    {
        return $this->render('changeok');
    }
       public function actionXiuresult()
    {
        return $this->render('xiuresult');
    }
     public function actionList()
    {
        return $this->render('list');
    }
      public function actionClose()
    {
        return $this->render('close');
    }
    
      public function actionCloseqian()
    {
        return $this->render('closeqian');
    }
    

     public function actionTest()
    {
        return $this->render('test');
    }
     public function actionReply()
    {
        return $this->render('reply');
    }

     public function actionVipreply()
    {
        return $this->render('vipreply');
    }
     public function actionVipreply2()
    {
        return $this->render('vipreply2');
    }
    /**
     * Displays a single UsermobileModel model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UsermobileModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsermobileModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsermobileModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UsermobileModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsermobileModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return UsermobileModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsermobileModel::findOne($id)) !== null) {
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
