<?php
namespace frontend\models;


use common\models\PostModel;
/**
 * 文章表单模型
 */
use Yii;
use yii\base\Model;
use yii\base\Object;
//use common\models\UserModel;

class PostForm extends Model{
	public $id;
	public $title;
	public $content;
	public $label_img;
	public $cat_id;
	public $tags;

	public $_lastError="";

	//定义场景
	const SCENARIOS_CREATE='create';
  const SCENARIOS_UPDATE='update';

  //事件设置
  const EVENT_AFTER_CREATE = "eventAfterCreate";
  const EVENT_AFTER_UPDATE = "eventAfterUpdate";

    //设置场景
    public function scenarios()
    {
    	$scenarios = [
           self::SCENARIOS_CREATE=>['title','content','cat_id','tags'],
           self::SCENARIOS_UPDATE=>['title','content','cat_id','tags'],
    	];
    	return array_merge(parent::scenarios(),$scenarios);
    }
	public function rules(){
		return [
		   [['id','title','content','cat_id'],'required'],
		
		   [['id','cat_id'],'integer'],
		   ['title','string','min'=>4,'max'=>50],
       ];
	}

	public function attributeLabels(){
		return [
          'id' => '编号',
          'title' => '标题',
          'content' => '内容',
          //'label_img' => '标签图',
          'tags' => '标签',
          'cat_id' => '分类',
		];
	}

   //创建文章
   public function create()
   {
     // 事务
     $transaction = Yii::$app->db->beginTransaction();
     try{
     	  $model = new PostModel();
     	  $model-> setAttributes($this->attributes);
        $model->summary = $this->_getSummary();
        $model->user_id = Yii::$app->user->identity->id;
        $model->user_name = Yii::$app->user->identity->username;
        $model->is_valid = PostModel::IS_VALID;
        $model->created_at = time();
        $model->updated_at=time();
        if(!$model->save()){
           throw new \Exception('文章保存失败！');
        }

        $this->id = $model->id;

        //调用事件
        $data = array_merge($this->getAttributes(),$model->getAttributes());
        $this->_eventAfterCreate($data);      

     	$transaction->commit();
     	return true;
     }catch(\Exception $e){
     	$transaction->rollBack();
     	$this->_lastError = $e->getMessage(); //记录错误,回滚机制
     	//return false;
      echo "有错误！";
     }
   }
  
public function getViewById($id)
{
  $res = PostModel::find()->where(['id'=>$id])->asArray()->one();
  if(!$res){
    //throw new \Exception('文章不存在！');
    echo "文章不存在！";
  }
  return $res;
} 

  
  //截取文章摘要
  private function _getSummary($s=0,$e=90,$char='utf-8'){
    if(empty($this->content))
    	return null;

    return (mb_substr(str_replace('&nbsp;','',strip_tags($this->content)),$s,$e,$char));
  }

  // 创建完成后事件的调用方法
  public function _eventAfterCreate($data)
  {
    //添加事件，标签
    $this->on(self::EVENT_AFTER_CREATE,[$this,'_eventAddTag'],$data);
    //触发事件
    $this->trigger(self::EVENT_AFTER_CREATE);
  }
  
  //添加标签
  public function _eventAddTag()
  {

  }

}