<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeacherleiModel;

/**
 * TeacherleiSearch represents the model behind the search form about `common\models\TeacherleiModel`.
 */
class TeacherleiSearch extends TeacherleiModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'tl_id'], 'integer'],
            [['tl_name'], 'safe'],
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
        $query = TeacherleiModel::find();

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
            'tl_id' => $this->tl_id,
        ]);

        $query->andFilterWhere(['like', 'tl_name', $this->tl_name]);

        return $dataProvider;
    }
}
