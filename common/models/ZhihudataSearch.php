<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZhihudataModel;

/**
 * ZhihudataSearch represents the model behind the search form about `common\models\ZhihudataModel`.
 */
class ZhihudataSearch extends ZhihudataModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['customer', 'jindu', 'user', 'createtime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ZhihudataModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id' => $this->Id,
        ]);

        $query->andFilterWhere(['like', 'customer', $this->customer])
            ->andFilterWhere(['like', 'jindu', $this->jindu])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'createtime', $this->createtime]);

        return $dataProvider;
    }
}
