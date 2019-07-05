<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\base\BaseModel;
/**
 * This is the model class for table "aleibie".
 *
 * @property integer $id
 * @property integer $l_leibie
 * @property string $l_name
 */
class AleibieModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aleibie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['l_leibie'], 'integer'],
            [['l_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'l_leibie' => '学员类别',
            'l_name' => '类别名称',
        ];
    }
}
