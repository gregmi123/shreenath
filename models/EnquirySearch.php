<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enquiry;
use app\controllers\Helper;

/**
 * EnquirySearch represents the model behind the search form of `app\models\Enquiry`.
 */
class EnquirySearch extends Enquiry
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'finance_type', 'urgency','status', 'fk_brand', 'fk_model', 'fk_color', 'fk_user_id', 'fk_organization_id', 'fk_branch_id'], 'integer'],
            [['customer_name', 'address', 'contact_no', 'email', 'target_time', 'remarks', 'created_date'], 'safe'],
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
        // $query = Enquiry::find();
        $helper=new Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        if($user_details['type']==3){
            $query = Enquiry::find()->where(['fk_branch_id'=>$user_details['fk_branch_id']])->orderBy(['target_time'=>SORT_DESC]);
        }else if($user_details['type']==2){
            $query = Enquiry::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']])->orderBy(['target_time'=>SORT_DESC]);
        }else{
            $query = Enquiry::find();
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
            'finance_type' => $this->finance_type,
            'urgency' => $this->urgency,
            'fk_brand' => $this->fk_brand,
            'fk_model' => $this->fk_model,
            'fk_color' => $this->fk_color,
            'fk_user_id' => $this->fk_user_id,
            'fk_organization_id' => $this->fk_organization_id,
            'fk_branch_id' => $this->fk_branch_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'contact_no', $this->contact_no])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'target_time', $this->target_time])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'created_date', $this->created_date]);

        return $dataProvider;
    }
}
