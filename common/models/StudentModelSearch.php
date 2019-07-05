<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentModel;

/**
 * StudentModelSearch represents the model behind the search form about `common\models\StudentModel`.
 */
class StudentModelSearch extends StudentModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_id', 'c_id', 't_id', 's_telephone', 's_ctimes', 'c_leibie', 'created_at', 'update_at'], 'integer'],
            [['s_weixin', 's_name', 's_sex', 's_state', 's_note', 't_beizhu', 'password', 'password_hash', 'l_lei_id'], 'safe'],
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
        $query = StudentModel::find();

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
            's_id' => $this->s_id,
            'c_id' => $this->c_id,
            't_id' => $this->t_id,
            's_telephone' => $this->s_telephone,
            's_ctimes' => $this->s_ctimes,
            'c_leibie' => $this->c_leibie,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 's_weixin', $this->s_weixin])
            ->andFilterWhere(['like', 's_name', $this->s_name])
            ->andFilterWhere(['like', 's_sex', $this->s_sex])
            ->andFilterWhere(['like', 's_state', $this->s_state])
            ->andFilterWhere(['like', 's_note', $this->s_note])
            ->andFilterWhere(['like', 't_beizhu', $this->t_beizhu])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'l_lei_id', $this->l_lei_id]);

        return $dataProvider;
    }
}
