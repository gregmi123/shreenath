<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Organizations;

/**
 * OrganizationsSearch represents the model behind the search form of `app\models\Organizations`.
 */
class OrganizationsSearch extends Organizations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_province', 'fk_district', 'fk_municipal', 'fk_ward'], 'integer'],
            [['name_nepali', 'name_english', 'phone', 'email', 'fax', 'tol', 'org_code', 'created_date', 'last_updated_date'], 'safe'],
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
        $query = Organizations::find();

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
            'fk_province' => $this->fk_province,
            'fk_district' => $this->fk_district,
            'fk_municipal' => $this->fk_municipal,
            'fk_ward' => $this->fk_ward,
        ]);

        $query->andFilterWhere(['like', 'name_nepali', $this->name_nepali])
            ->andFilterWhere(['like', 'name_english', $this->name_english])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'tol', $this->tol])
            ->andFilterWhere(['like', 'org_code', $this->org_code])
            ->andFilterWhere(['like', 'created_date', $this->created_date])
            ->andFilterWhere(['like', 'last_updated_date', $this->last_updated_date]);

        return $dataProvider;
    }
}
