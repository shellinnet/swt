<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;
/**
 * This is the model class for table "zhihudata".
 *
 * @property integer $Id
 * @property string $customer
 * @property string $jindu
 * @property string $user
 * @property string $createtime
 */
class ZhihudataModel extends UserModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zhihudata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer', 'user', 'createtime'], 'string', 'max' => 255],
            [['jindu'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => '编号',
            'customer' => '客户名',
            'jindu' => '进度',
            'user' => '负责人',
            'createtime' => '开始时间',
        ];
    }
}
