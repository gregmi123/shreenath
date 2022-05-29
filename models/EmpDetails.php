<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emp_details".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string $photo
 * @property string|null $contract_letter
 * @property int $fk_branch_id
 * @property int $fk_organization_id
 * @property int $fk_user_id
 * @property string $created_date
 * @property string|null $updated_date
 * @property int $fk_province
 * @property int $fk_district
 * @property int $fk_municipal
 * @property int $fk_ward
 * @property string $tol
 * @property string $emp_code
 * @property string $blood_group
 * @property int $gender
 */
class EmpDetails extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'emp_details';
    }

    /**
     * {@inheritdoc}
     */
    public $image;
    public $contract;

    public function rules() {
        return [
            [['name', 'gender', 'phone','fk_branch_id', 'fk_organization_id', 'fk_user_id', 'created_date', 'fk_province', 'fk_district', 'fk_municipal', 'fk_ward', 'tol', 'emp_code'], 'required'],
            [['fk_branch_id', 'fk_organization_id', 'fk_user_id', 'fk_province', 'fk_district', 'fk_municipal', 'fk_ward'], 'integer'],
            [['name', 'blood_group', 'photo', 'contract_letter', 'created_date', 'tol'], 'string', 'max' => 250],
            [['phone', 'email', 'updated_date', 'emp_code'], 'string', 'max' => 50],
            [['image', 'contract'], 'file', 'extensions' => 'jpeg,jpg,png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'photo' => 'Photo',
            'contract_letter' => 'Contract Letter',
            'fk_branch_id' => 'Branch',
            'fk_organization_id' => 'Organization',
            'fk_user_id' => 'Fk User ID',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'fk_province' => 'Province',
            'fk_district' => 'District',
            'fk_municipal' => 'Municipal',
            'fk_ward' => 'Fk Ward',
            'tol' => 'Tol',
            'emp_code' => 'Emp Code',
            'image' => 'Photo',
            'contract' => 'Contract Letter',
        ];
    }

}
