<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\base\BaseModel;
/**
 * This is the model class for table "articlelei".
 *
 * @property integer $Id
 * @property integer $a_liebie_id
 * @property string $lei_name
 */
class ArticleleiModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articlelei';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_liebie_id'], 'integer'],
            [['lei_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'a_liebie_id' => '文章分类ID',
            'lei_name' => '分类名称',
        ];
    }
}
