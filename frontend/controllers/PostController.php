<?php
/**
 * 文章控制器
 */
namespace frontend\controllers;

use Yii;
use frontend\controllers\base\BaseController;
use frontend\models\PostForm;
use common\models\CatModel;
//use common\widgets\file_upload\FileUpload;

class PostController extends BaseController
{
       public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],

            'ueditor'=>[
            'class' => 'common\widgets\ueditor\UeditorAction',
            'config'=>[
                //上传图片配置
                'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
            ]
        ]
        ];
    }

	/**
	 * 文章列表
	 */
	public function actionIndex(){
		return $this->render('index');  //渲染页面
	}

/**
 * 文章创建
 */
 public function actionCreate(){
	$model = new PostForm();

	//定义场景
	$model->setScenario(PostForm::SCENARIOS_CREATE);
	if($model->load(Yii::$app->request->post())&&$model->validate()){
       if(!$model->create()){
       	Yii::$app->session->setFlash('waring',$model->_lastError);
       }else{
       	return $this->redirect(['post/view','id'=>$model->id]);
       }
    	}else{
    	//获取所有分类
    	$cat = CatModel::getAllCats();
    	return $this->render('create',['model'=>$model,'cat'=>$cat]);  
        }
  }

  /**
   * 文章详情
   */
  public function actionView($id)
  {
     $model = new PostForm();  // 获取数据
     $data = $model-> getViewById($id);

     return $this->render('view',['data'=>$data]);
  }
}
 