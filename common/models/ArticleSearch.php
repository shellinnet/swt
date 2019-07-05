<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ArticleModel;

/**
 * ArticleSearch represents the model behind the search form about `common\models\ArticleModel`.
 */
class ArticleSearch extends ArticleModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'a_liebie_id'], 'integer'],
            [['a_biaoti', 'a_neirong', 'a_time'], 'safe'],
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
        $query = ArticleModel::find();

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
            'a_time' => $this->a_time,
            'a_liebie_id' => $this->a_liebie_id,
        ]);

        $query->andFilterWhere(['like', 'a_biaoti', $this->a_biaoti])
            ->andFilterWhere(['like', 'a_neirong', $this->a_neirong]);

        return $dataProvider;
    }
}
