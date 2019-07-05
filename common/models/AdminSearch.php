<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AdminModel;

/**
 * AdminSearch represents the model behind the search form about `common\models\AdminModel`.
 */
class AdminSearch extends AdminModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'm_tel', 'm_qx_id', 'created_at', 'status', 'role', 'updated_at'], 'integer'],
            [['m_weixin', 'm_name', 'm_sex', 'm_rzdate', 'm_beizhu', 'username', 'password', 'password_hash', 'adminemail', 'auth_key'], 'safe'],
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
        $query = AdminModel::find();

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
            'm_tel' => $this->m_tel,
            'm_qx_id' => $this->m_qx_id,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'role' => $this->role,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'm_weixin', $this->m_weixin])
            ->andFilterWhere(['like', 'm_name', $this->m_name])
            ->andFilterWhere(['like', 'm_sex', $this->m_sex])
            ->andFilterWhere(['like', 'm_rzdate', $this->m_rzdate])
            ->andFilterWhere(['like', 'm_beizhu', $this->m_beizhu])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'adminemail', $this->adminemail])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
