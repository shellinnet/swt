<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserModel;

/**
 * UserSearch represents the model behind the search form about `common\models\UserModel`.
 */
class UserSearch extends UserModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'role', 'status', 'created_at', 'vip', 'updated_at'], 'integer'],
            [['username', 'password', 'password_hash', 'email', 'emal_validate', 'avator', 'auth_key'], 'safe'],
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
        $query = UserModel::find();

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
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'vip' => $this->vip,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'emal_validate', $this->emal_validate])
            ->andFilterWhere(['like', 'avator', $this->avator])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
