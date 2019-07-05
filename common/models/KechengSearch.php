<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KechengModel;

/**
 * KechengSearch represents the model behind the search form about `common\models\KechengModel`.
 */
class KechengSearch extends KechengModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['id'], 'required'],
            [['id', 'zks', 'teacherid', 'keid'], 'integer'],
         
            [['kname'], 'string', 'max' => 50],
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
        $query = KechengModel::find();

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
            'keid' => $this->keid,
            'zks' => $this->zks,
            'teacherid' => $this->teacherid,
            'ktime_id' => $this->ktime_id,
            'jwid' => $this->jwid,
        ]);

        $query->andFilterWhere(['like', 'kname', $this->kname])
            ->andFilterWhere(['like', 'introduce1', $this->introduce1]);

        return $dataProvider;
    }
}
