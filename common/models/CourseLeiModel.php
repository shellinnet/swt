<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\base\BaseModel;

/**
 * This is the model class for table "course_lei".
 *
 * @property integer $id
 * @property integer $c_leibie
 * @property string $c_leiname
 */
class CourseLeiModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_lei';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_leibie'], 'integer'],
            [['c_leiname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_leibie' => '课程类别',
            'c_leiname' => '课程名称',
        ];
    }
}
