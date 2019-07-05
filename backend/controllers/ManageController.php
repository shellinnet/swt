<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;
use backend\models\Admin;
use yii\data\Pagination;
use backend\controllers\CommonController;
use backend\models\Rbac;

class ManageController extends CommonController
{
    protected $mustlogin = ['assign', 'mailchangepass', 'managers', 'reg', 'del', 'changeemail', 'changepass'];
    public function actionMailchangepass()
    {
        $this->layout = false;
        $time = Yii::$app->request->get("timestamp");
        $username = Yii::$app->request->get("username");
        $token = Yii::$app->request->get("token");
        $model = new Admin;
        $myToken = $model->createToken($username, $time);
        if ($token != $myToken) {
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        if (time() - $time > 300) {
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->changePass($post)) {
                Yii::$app->session->setFlash('info', '密码修改成功');
            }
        }
        $model->username = $username;
        return $this->render("mailchangepass", ['model' => $model]);

    }

    public function actionManagers()
    {
        //$this->layout = "layout1";
        $model = Admin::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['manage'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $managers = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("managers", ['managers' => $managers, 'pager' => $pager]);
    }

    public function actionReg()
    {
        //$this->layout = 'layout1';
        $model = new Admin;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->reg($post)) {
                Yii::$app->session->setFlash('info', '添加成功');
            } else {
                Yii::$app->session->setFlash('info', '添加失败');
            }
        }
        $model->password = '';
        $model->repass = '';
        return $this->render('reg', ['model' => $model]);
    }

    public function actionDel()
    {
        $id = (int)Yii::$app->request->get("id");
        if (empty($id) || $id == 1) {
            $this->redirect(['manage/managers']);
            return false;
        }
        $model = new Admin;
        if ($model->deleteAll('id = :id', [':id' => $id])) {
            Yii::$app->session->setFlash('info', '删除成功');
            $this->redirect(['manage/managers']);
        }
    }

    public function actionChangeemail()
    {
        //$this->layout = 'layout1';
        parent::init();
      
        $model = Admin::find()->where('id = :user', [':user' => $this->userId])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->changeemail($post)) {
                Yii::$app->session->setFlash('info', '修改成功');
            }
        }
        $model->password = "";
        return $this->render('changeemail', ['model' => $model]);
    }

    public function actionChangepass()
    {
        //$this->layout = "layout1";
        $model = Admin::find()->where('id = :user', [':user' => $this->userId])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->changepass($post)) {
                Yii::$app->session->setFlash('info', '修改成功');
            }
        }
        $model->password = '';
        $model->repass = '';
        return $this->render('changepass', ['model' => $model]);
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
