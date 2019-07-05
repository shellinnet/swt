<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ArticleleiModel;

/**
 * ArticleleiSearch represents the model behind the search form about `common\models\ArticleleiModel`.
 */
class ArticleleiSearch extends ArticleleiModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'a_liebie_id'], 'integer'],
            [['lei_name'], 'safe'],
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
        $query = ArticleleiModel::find();

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
            'a_liebie_id' => $this->a_liebie_id,
        ]);

        $query->andFilterWhere(['like', 'lei_name', $this->lei_name]);

        return $dataProvider;
    }
}
