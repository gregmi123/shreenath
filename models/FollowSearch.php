<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Follow;

/**
 * FollowSearch represents the model behind the search form of `app\models\Follow`.
 */
class FollowSearch extends Follow
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_enquiry', 'fk_user', 'fk_branch', 'status'], 'integer'],
            [['reamarks', 'previous_date', 'updated_date'], 'safe'],
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
        $query = Follow::find();

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
            'fk_enquiry' => $this->fk_enquiry,
            'fk_user' => $this->fk_user,
            'fk_branch' => $this->fk_branch,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'reamarks', $this->reamarks])
            ->andFilterWhere(['like', 'previous_date', $this->previous_date])
            ->andFilterWhere(['like', 'updated_date', $this->updated_date]);

        return $dataProvider;
    }
}
