<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\base\BaseModel;
/**
 * This is the model class for table "teacherlei".
 *
 * @property integer $Id
 * @property integer $tl_id
 * @property string $tl_name
 */
class TeacherleiModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacherlei';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tl_id'], 'integer'],
            [['tl_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'tl_id' => '老师类别ID',
            'tl_name' => '老师类别名称',
        ];
    }
}
