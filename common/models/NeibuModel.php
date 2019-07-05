<?php

namespace common\models;

use yii\base\Model;
use common\models\base\BaseModel;

/**
 * This is the model class for table "neibu".
 *
 * @property integer $Id
 * @property string $username
 * @property string $userpassword
 * @property string $liebie
 * @property string $createtime
 * @property integer $kehu
 */
class NeibuModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'neibu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kehu'], 'integer'],
            [['username', 'userpassword', 'liebie', 'createtime'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => '编号',
            'username' => '用户名',
            'userpassword' => '密码',
            'liebie' => '部门',
            'createtime' => '加入时间',
            'kehu' => '客户',
        ];
    }
}
