<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\base\BaseModel;
/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $a_biaoti
 * @property string $a_neirong
 * @property string $a_time
 * @property integer $a_liebie_id
 */
class ArticleModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_neirong'], 'string'],
            [['a_time'], 'safe'],
            [['a_liebie_id'], 'integer'],
            [['a_biaoti'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'a_biaoti' => '文章标题',
            'a_neirong' => '文章内容',
            'a_time' => '创建时间',
            'a_liebie_id' => '文章类别ID',
        ];
    }
}
