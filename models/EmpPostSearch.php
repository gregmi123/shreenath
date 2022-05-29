<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmpPost;

/**
 * EmpPostSearch represents the model behind the search form of `app\models\EmpPost`.
 */
class EmpPostSearch extends EmpPost
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_organization_id', 'fk_user_id'], 'integer'],
            [['post', 'created_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = EmpPost::find();

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
            'fk_organization_id' => $this->fk_organization_id,
            'fk_user_id' => $this->fk_user_id,
        ]);

        $query->andFilterWhere(['like', 'post', $this->post])
            ->andFilterWhere(['like', 'created_date', $this->created_date]);

        return $dataProvider;
    }
}
