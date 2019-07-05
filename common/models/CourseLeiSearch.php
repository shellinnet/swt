<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CourseLeiModel;

/**
 * CourseLeiSearch represents the model behind the search form about `common\models\CourseLeiModel`.
 */
class CourseLeiSearch extends CourseLeiModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'c_leibie'], 'integer'],
            [['c_leiname'], 'safe'],
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
        $query = CourseLeiModel::find();

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
            'c_leibie' => $this->c_leibie,
        ]);

        $query->andFilterWhere(['like', 'c_leiname', $this->c_leiname]);

        return $dataProvider;
    }
}
