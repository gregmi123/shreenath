<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmpDetails;

/**
 * EmpDetailsSearch represents the model behind the search form of `app\models\EmpDetails`.
 */
class EmpDetailsSearch extends EmpDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_branch_id', 'fk_organization_id', 'fk_user_id', 'fk_province', 'fk_district', 'fk_municipal', 'fk_ward'], 'integer'],
            [['name', 'phone', 'email', 'photo', 'contract_letter', 'created_date', 'updated_date', 'tol', 'emp_code'], 'safe'],
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
        // $query = EmpDetails::find();
        $helper=new \app\controllers\Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        if($user_details['type']==3){
            $query = EmpDetails::find()->where(['fk_branch_id'=>$user_details['fk_branch_id']]);
        }else if($user_details['type']==2){
            $query = EmpDetails::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']]);
        }else{
            $query = EmpDetails::find();
        }

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
            'fk_branch_id' => $this->fk_branch_id,
            'fk_organization_id' => $this->fk_organization_id,
            'fk_user_id' => $this->fk_user_id,
            'fk_province' => $this->fk_province,
            'fk_district' => $this->fk_district,
            'fk_municipal' => $this->fk_municipal,
            'fk_ward' => $this->fk_ward,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'contract_letter', $this->contract_letter])
            ->andFilterWhere(['like', 'created_date', $this->created_date])
            ->andFilterWhere(['like', 'updated_date', $this->updated_date])
            ->andFilterWhere(['like', 'tol', $this->tol])
            ->andFilterWhere(['like', 'emp_code', $this->emp_code]);

        return $dataProvider;
    }
}
