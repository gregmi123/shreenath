<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enquiry".
 *
 * @property int $id
 * @property string $customer_name
 * @property string $address
 * @property string $contact_no
 * @property string $email
 * @property string $target_time
 * @property int $finance_type
 * @property int $urgency
 * @property string|null $remarks
 * @property int $fk_brand
 * @property int $fk_model
 * @property int $fk_color
 * @property int $fk_user_id
 * @property int $fk_organization_id
 * @property int|null $fk_branch_id
 * @property string $created_date
 */
class Enquiry extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'enquiry';
    }

    /**
     * {@inheritdoc}
     */
    const HOT = 1;
    const MEDIUM = 2;
    const COLD = 3;
    const FINANCE = 1;
    const CASH = 2;
    const RUNNING=0;
    const SUCCESS=1;
    const CANCEL=2;
    const SUBMITTED=3;
    public $message;
    public function rules() {
        return [
            [['customer_name', 'address', 'contact_no', 'email', 'target_time', 'finance_type', 'urgency', 'fk_brand', 'fk_model', 'fk_color', 'fk_user_id', 'fk_organization_id', 'created_date'], 'required'],
            [['finance_type', 'urgency', 'fk_brand', 'fk_model', 'fk_color', 'fk_user_id', 'fk_organization_id', 'fk_branch_id','status'], 'integer'],
            [['remarks','message'], 'string'],
            [['customer_name', 'address', 'contact_no', 'target_time'], 'string', 'max' => 250],
            [['email'], 'string', 'max' => 100],
            [['created_date','created_date_en'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'address' => 'Address',
            'contact_no' => 'Contact No',
            'email' => 'Email',
            'target_time' => 'Target Time',
            'finance_type' => 'Payment Type',
            'urgency' => 'Urgency',
            'remarks' => 'Remarks',
            'fk_brand' => 'Brand',
            'fk_model' => 'Model',
            'fk_color' => 'Color',
            'fk_user_id' => 'Fk User ID',
            'fk_organization_id' => 'Fk Organization ID',
            'fk_branch_id' => 'Fk Branch ID',
            'created_date' => 'Created Date',
        ];
    }

    public static function getType() {
        return [
            self::HOT => 'HOT',
            self::MEDIUM => 'MEDIUM',
            self::COLD => 'COLD',
        ];
    }

    public static function getFinanceType() {
        return [
            self::CASH => 'CASH',
            self::FINANCE => 'FINANCE',
        ];
    }

    public function getBrand() {
        return $this->hasOne(Brand::className(), ['id' => 'fk_brand']);
    }

    public function getModel() {
        return $this->hasOne(VehicleModel::className(), ['id' => 'fk_model']);
    }

    public function getColor() {
        return $this->hasOne(Color::className(), ['id' => 'fk_color']);
    }
}
