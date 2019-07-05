<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ShopUserModel;

/**
 * ShopUserSearch represents the model behind the search form about `common\models\ShopUserModel`.
 */
class ShopUserSearch extends ShopUserModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'created_at', 'shiduanid', 'itemid', 'updated_at','teacherid','total','lastkeshi'], 'integer'],
            [['username', 'password', 'email', 'openid', 'password_hash', 'auth_key', 'avator', 'truename', 'mobile', 'riqi',   'liuyan'], 'safe'],
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
        $query = ShopUserModel::find();

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
            'userid' => $this->userid,
            'created_at' => $this->created_at,
            'shiduanid' => $this->shiduanid,
            'itemid' => $this->itemid,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'avator', $this->avator])
            ->andFilterWhere(['like', 'truename', $this->truename])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
        
          
            ->andFilterWhere(['like', 'riqi', $this->riqi])
            ->andFilterWhere(['like', 'total', $this->total])
            ->andFilterWhere(['like', 'lastkeshi', $this->lastkeshi])
            ->andFilterWhere(['like', 'liuyan', $this->liuyan]);

        return $dataProvider;
    }
}
