<?php

namespace backend\controllers;

use Yii;
use common\models\KechengModel;
use common\models\KechengSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\CommonController;
use backend\models\Rbac;
/**
 * KechengController implements the CRUD actions for KechengModel model.
 */
class KechengController extends CommonController
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
     * Lists all KechengModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KechengSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KechengModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

       public function actionMain()
    {
        return $this->render('main');
    }
      public function actionXiu()
    {
        return $this->render('xiu');
    }

       public function actionXiugai()
    {
        return $this->render('xiugai');
    }

       public function actionKebiao()
    {
        return $this->render('kebiao');
    }
      public function actionKebiao2()
    {
        return $this->render('kebiao2');
    }
        public function actionTiao()
    {
        return $this->render('tiao');
    }
        public function actionTiaozheng()
    {
        return $this->render('tiaozheng');
    }

        public function actionAddok()
    {
        return $this->render('addok');
    }
        public function actionAddkecheng()
    {
        return $this->render('addkecheng');
    }
         public function actionVipkebiao()
    {
        return $this->render('vipkebiao');
    }

         public function actionVipkebiao2()
    {
        return $this->render('vipkebiao2');
    }
    public function actionXiuxi()
    {
        return $this->render('xiuxi');
    }
  public function actionXiuxiok()
    {
        return $this->render('xiuxiok');
    }
        public function actionAddpai()
    {
        return $this->render('addpai');
    }

        public function actionAddpaiok()
    {
        return $this->render('addpaiok');
    }

        public function actionXiuok()
    {
        return $this->render('xiuok');
    }


        public function actionDownload()
    {
        return $this->render('download');
    }

       public function actionTiaovip()
    {
        return $this->render('tiaovip');
    }
    /**
     * Creates a new KechengModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KechengModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->keid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KechengModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->keid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

   

    /**
     * Deletes an existing KechengModel model.
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
     * Finds the KechengModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KechengModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KechengModel::findOne($id)) !== null) {
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
