<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TongzhiModel;

/**
 * TongzhiSearch represents the model behind the search form about `common\models\TongzhiModel`.
 */
class TongzhiSearch extends TongzhiModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['created_time'], 'datetime'],
            [['neirong'], 'string'],
            [['biaoti','img','img2'], 'string', 'max' => 255],
            [['topbiaoti'], 'string', 'max' => 32],
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
        $query = TongzhiModel::find();

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
            'created_time' => $this->created_time,
        ]);

        $query->andFilterWhere(['like', 'biaoti', $this->biaoti])
              ->andFilterWhere(['like', 'topbiaoti', $this->topbiaoti])
              ->andFilterWhere(['like', 'img', $this->img])
              ->andFilterWhere(['like', 'img2', $this->img2])
            ->andFilterWhere(['like', 'neirong', $this->neirong]);

        return $dataProvider;
    }
}
