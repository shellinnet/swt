<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\base\BaseModel;
/**
 * This is the model class for table "t_lei".
 *
 * @property integer $id
 * @property integer $tl_id
 * @property string $tl_name
 */
class TLeiModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_lei';
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
            'id' => 'ID',
            'tl_id' => '老师类别',
            'tl_name' => '类别名称',
        ];
    }
}
