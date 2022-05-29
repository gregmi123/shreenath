<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;
use app\controllers\Helper;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_employee', 'fk_user_id', 'fk_branch_id', 'fk_organization_id', 'status'], 'integer'],
            [['remarks', 'in_date', 'out_date', 'created_date'], 'safe'],
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
        // $query = Activity::find();
        $helper=new Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        if($user_details['type']==3){
            $query = Activity::find()->where(['fk_branch_id'=>$user_details['fk_branch_id']]);
        }else if($user_details['type']==2){
            $query = Activity::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']]);
        }else{
            $query = Activity::find();
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
            'fk_employee' => $this->fk_employee,
            'fk_user_id' => $this->fk_user_id,
            'fk_branch_id' => $this->fk_branch_id,
            'fk_organization_id' => $this->fk_organization_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'in_date', $this->in_date])
            ->andFilterWhere(['like', 'out_date', $this->out_date])
            ->andFilterWhere(['like', 'created_date', $this->created_date]);

        return $dataProvider;
    }
}
