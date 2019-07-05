<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\YuyuekechengModel;

/**
 * YuyuekechengSearch represents the model behind the search form about `common\models\YuyuekechengModel`.
 */
class YuyuekechengSearch extends YuyuekechengModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kid', 'teacherid', 'keshi', 'sum', 'nsum'], 'integer'],
            [[ 'datetime'], 'safe'],
            [['kecheng'], 'string', 'max' => 100],
            [['biaoti'], 'string', 'max' => 255],
            [['jieshao'], 'string'],
            [['img'],'file','skipOnEmpty'=>false,'extensions'=>'png,jpg'],
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
        $query = YuyuekechengModel::find();

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
            'kid' => $this->kid,
            'teacherid' => $this->teacherid,
            'keshi' => $this->keshi,
            'sum' => $this->sum,
            'datetime' => $this->datetime,
            'nsum' => $this->nsum,
            'biaoti'=>$this->biaoti,
            'jieshao'=>$this->jieshao,
            'img'=>$this->img
        ]);

        $query->andFilterWhere(['like', 'kecheng', $this->kecheng]);

        return $dataProvider;
    }
}
