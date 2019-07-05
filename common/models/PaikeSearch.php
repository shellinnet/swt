<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PaikeModel;

/**
 * PaikeSearch represents the model behind the search form about `common\models\PaikeModel`.
 */
class PaikeSearch extends PaikeModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'c_id', 't_id', 's_id', 'p_time_id', 'p_wei', 'p_s_qian', 'p_t_qian', 'p_quxiao'], 'integer'],
            [['p_date', 'p_t_beizhu'], 'safe'],
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
        $query = PaikeModel::find();

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
            'c_id' => $this->c_id,
            'p_date' => $this->p_date,
            't_id' => $this->t_id,
            's_id' => $this->s_id,
            'p_time_id' => $this->p_time_id,
            'p_wei' => $this->p_wei,
            'p_s_qian' => $this->p_s_qian,
            'p_t_qian' => $this->p_t_qian,
            'p_quxiao' => $this->p_quxiao,
        ]);

        $query->andFilterWhere(['like', 'p_t_beizhu', $this->p_t_beizhu]);

        return $dataProvider;
    }
}
