<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AleibieModel;

/**
 * AleibieSearch represents the model behind the search form about `common\models\AleibieModel`.
 */
class AleibieSearch extends AleibieModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'l_leibie'], 'integer'],
            [['l_name'], 'safe'],
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
        $query = AleibieModel::find();

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
            'id' => $this->id,
            'l_leibie' => $this->l_leibie,
        ]);

        $query->andFilterWhere(['like', 'l_name', $this->l_name]);

        return $dataProvider;
    }
}
