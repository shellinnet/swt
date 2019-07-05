<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeacherModel;

/**
 * TeacherSearch represents the model behind the search form about `common\models\TeacherModel`.
 */
class TeacherSearch extends TeacherModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tid', 'teacherid', 'teacherlei', 't_telephone', 'kcid', 'skrq', 'sdid', 'xyid', 'created_at', 'update_at','zks','ysks'], 'integer'],
            [['t_weixin', 'tname', 't_sex', 't_rzdate', 't_cydate', 't_beizhu', 'password', 'password_hash'], 'safe'],
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
        $query = TeacherModel::find();

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
            'tid' => $this->tid,
            'teacherid' => $this->teacherid,
            'teacherlei' => $this->teacherlei,
            't_telephone' => $this->t_telephone,
            'kcid' => $this->kcid,
            'skrq' => $this->skrq,
            'sdid' => $this->sdid,
            'xyid' => $this->xyid,
            'zks'=>$this->zks,
            'ysks'=>$this->ysks,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 't_weixin', $this->t_weixin])
            ->andFilterWhere(['like', 'tname', $this->tname])
            ->andFilterWhere(['like', 't_sex', $this->t_sex])
            ->andFilterWhere(['like', 't_rzdate', $this->t_rzdate])
            ->andFilterWhere(['like', 't_cydate', $this->t_cydate])
            ->andFilterWhere(['like', 't_beizhu', $this->t_beizhu])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash]);

        return $dataProvider;
    }
}
