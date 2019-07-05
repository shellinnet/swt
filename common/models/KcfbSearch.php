<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KcfbModel;

/**
 * KcfbSearch represents the model behind the search form about `common\models\KcfbModel`.
 */
class KcfbSearch extends KcfbModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'date'],
            [['neirong', 'neirong2'], 'string'],
            [['biaoti'], 'string', 'max' => 255],
            [['img1','img2','img3','img4'], 'string', 'max' => 150],
            [['kcname','kcname2','kcname3','kcname4'], 'string', 'max' => 32],
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
        $query = KcfbModel::find();

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
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'biaoti', $this->biaoti])
            ->andFilterWhere(['like', 'neirong', $this->neirong])
            ->andFilterWhere(['like', 'neirong2', $this->neirong2])
            ->andFilterWhere(['like', 'img1', $this->img1])
            ->andFilterWhere(['like', 'img2', $this->img2])
            ->andFilterWhere(['like', 'img3', $this->img3])
            ->andFilterWhere(['like', 'img4', $this->img4])
            ->andFilterWhere(['like', 'kcname', $this->kcname])
            ->andFilterWhere(['like', 'kcname2', $this->kcname2])
            ->andFilterWhere(['like', 'kcname3', $this->kcname3])
            ->andFilterWhere(['like', 'kcname4', $this->kcname4]);

        return $dataProvider;
    }
}
