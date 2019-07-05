<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CourseModel;

/**
 * CourseSearch represents the model behind the search form about `common\models\CourseModel`.
 */
class CourseSearch extends CourseModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ktime_id', 'kid', 'total', 'tqian', 'tsyks', 'xueyuanid', 'syks', 'status', 'jwid'], 'integer'],
            [['time', 'tnote', 'formid', 'openid'], 'safe'],
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
        $query = CourseModel::find();

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
            'ktime_id' => $this->ktime_id,
            'kid' => $this->kid,
            'total' => $this->total,
            'tqian' => $this->tqian,
            'tsyks' => $this->tsyks,
            'xueyuanid' => $this->xueyuanid,
            'syks' => $this->syks,
            'status' => $this->status,
            'jwid' => $this->jwid,
            'firsttime'=>$this->firsttime,
            'endtime'=>$this->endtime,
        ]);

        $query->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'tnote', $this->tnote])
            ->andFilterWhere(['like', 'formid', $this->formid])
            ->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'week', $this->week]);
    

        return $dataProvider;
    }
}
