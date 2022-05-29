<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Saleform;
use app\controllers\Helper;

/**
 * SaleformSearch represents the model behind the search form of `app\models\Saleform`.
 */
class SaleformSearch extends Saleform
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'p_province', 'p_district', 'p_municipal', 'p_ward', 't_province', 't_district', 't_municipal', 't_ward', 'brand', 'model', 'color', 'fk_branch', 'fk_user', 'fk_organization', 'status'], 'integer'],
            [['name', 'total_amt', 'paid_amt', 'due_amt', 'completion_date', 'displacement', 'frame_no', 'engine_no', 'reg_no', 'vehicle_type', 'thumb_left', 'left_iso_template', 'left_ansi_template', 'thumb_right', 'right_iso_template', 'right_ansi_template', 'citizenship_number', 'jaari_date', 'mobile_no', 'inspection_report', 'citizenship_no', 'vat_doc', 'owner_citizenship', 'certificate', 'created_date'], 'safe'],
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
        // $query = Saleform::find();
        $helper=new Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        if($user_details['type']==3){
            $query = Saleform::find()->where(['fk_branch'=>$user_details['fk_branch_id']]);
        }else if($user_details['type']==2){
            $query = Saleform::find()->where(['fk_organization'=>$user_details['fk_organization_id']]);
        }else{
            $query = Saleform::find();
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
            'p_province' => $this->p_province,
            'p_district' => $this->p_district,
            'p_municipal' => $this->p_municipal,
            'p_ward' => $this->p_ward,
            't_province' => $this->t_province,
            't_district' => $this->t_district,
            't_municipal' => $this->t_municipal,
            't_ward' => $this->t_ward,
            'brand' => $this->brand,
            'model' => $this->model,
            'color' => $this->color,
            'fk_branch' => $this->fk_branch,
            'fk_user' => $this->fk_user,
            'fk_organization' => $this->fk_organization,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'total_amt', $this->total_amt])
            ->andFilterWhere(['like', 'paid_amt', $this->paid_amt])
            ->andFilterWhere(['like', 'due_amt', $this->due_amt])
            ->andFilterWhere(['like', 'completion_date', $this->completion_date])
            ->andFilterWhere(['like', 'displacement', $this->displacement])
            ->andFilterWhere(['like', 'frame_no', $this->frame_no])
            ->andFilterWhere(['like', 'engine_no', $this->engine_no])
            ->andFilterWhere(['like', 'reg_no', $this->reg_no])
            ->andFilterWhere(['like', 'vehicle_type', $this->vehicle_type])
            ->andFilterWhere(['like', 'thumb_left', $this->thumb_left])
            ->andFilterWhere(['like', 'left_iso_template', $this->left_iso_template])
            ->andFilterWhere(['like', 'left_ansi_template', $this->left_ansi_template])
            ->andFilterWhere(['like', 'thumb_right', $this->thumb_right])
            ->andFilterWhere(['like', 'right_iso_template', $this->right_iso_template])
            ->andFilterWhere(['like', 'right_ansi_template', $this->right_ansi_template])
            ->andFilterWhere(['like', 'citizenship_number', $this->citizenship_number])
            ->andFilterWhere(['like', 'jaari_date', $this->jaari_date])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'inspection_report', $this->inspection_report])
            ->andFilterWhere(['like', 'citizenship_no', $this->citizenship_no])
            ->andFilterWhere(['like', 'vat_doc', $this->vat_doc])
            ->andFilterWhere(['like', 'owner_citizenship', $this->owner_citizenship])
            ->andFilterWhere(['like', 'certificate', $this->certificate])
            ->andFilterWhere(['like', 'created_date', $this->created_date]);

        return $dataProvider;
    }
}
