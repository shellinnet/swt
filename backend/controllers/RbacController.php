<?php
  namespace backend\controllers;
  use Yii;
  use yii\web\Controller;
  use yii\data\ActiveDataProvider;
  use yii\db\Query;
  use backend\models\Rbac;
  use backend\controllers\CommonController;
class RbacController extends CommonController
{
  public $mustlogin = ['createrule', 'createrole', 'roles', 'assignitem'];
  public function actionCreaterole()
  {
  	 if (Yii::$app->request->isPost) {
            $auth = Yii::$app->authManager;
            $role = $auth->createRole(null);
            $post = Yii::$app->request->post();
            if (empty($post['name']) || empty($post['description'])) {
                throw new \Exception('参数错误');
            }
            $role->name = $post['name'];
            $role->description = $post['description'];
            $name= $post['name'];

            if ($auth->add($role)) {
                Yii::$app->session->setFlash('info', '添加成功');
            }
        }
  	return $this->render('_createitem');
  }

  public function actionRoles()
  {
    $auth = Yii::$app->authManager;
    $data = new ActiveDataProvider([
      'query'=>(new Query) ->from($auth->itemTable)->where('type=1')->orderBy('created_at desc'),
      'pagination'=>['pageSize'=>5],
      ]
      
    );
    
    return $this->render('_items',['dataProvider'=>$data]);
  }

   public function actionAssignitem($name)
    {
        $name = htmlspecialchars($name);
        $auth = Yii::$app->authManager;
        $parent = $auth->getRole($name);

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if (Rbac::addChild($post['children'], $name)) {
                Yii::$app->session->setFlash('info', '分配成功');
            }
        }
       // $roles = $auth->getRoles();
       // $permissions = $auth->getPermissions();
    
        $children = Rbac::getChildrenByName($name);
        $roles = Rbac::getOptions($auth->getRoles(), $parent);
        $permissions = Rbac::getOptions($auth->getPermissions(), $parent);
        return $this->render('_assignitem', ['parent' => $name, 'roles' => $roles, 'permissions' => $permissions,'children'=>$children]);
    }

public function actionCreaterule()
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if (empty($post['class_name'])) {
                throw new \Exception('参数错误');
            }
            $className = "app\\models\\". $post['class_name'];
            if (!class_exists($className)) {
                throw new \Exception('规则类不存在');
            }
            $rule = new $className;
            if (Yii::$app->authManager->add($rule)) {
                Yii::$app->session->setFlash('info', '添加成功');
            }
        }
        return $this->render("_createrule");
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
     public function actionJiben()
    {
        return $this->render('jiben');
      }
   public function actionJibenok(){
        return $this->render('jibenok');
    }
   public function actionUpdateitem(){
        return $this->render('updateitem');
    }
  public function actionDeleteitem(){
        return $this->render('deleteitem');
    }
   public function actionYes(){
        return $this->render('yes');
    }
   public function actionRolesok(){
        return $this->render('rolesok');
    }
  public function actionQuan(){
        return $this->render('quan');
    }
  public function actionXiugai(){
        return $this->render('xiugai');
    }
   public function actionXiugaiok(){
        return $this->render('xiugaiok');
    }
}
 
?>