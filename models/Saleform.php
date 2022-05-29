<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "saleform".
 *
 * @property int $id
 * @property string $name
 * @property int $p_province
 * @property int $p_district
 * @property int $p_municipal
 * @property int $p_ward
 * @property int $t_province
 * @property int $t_district
 * @property int $t_municipal
 * @property int $t_ward
 * @property string $total_amt
 * @property string $paid_amt
 * @property string $due_amt
 * @property string $completion_date
 * @property int $brand
 * @property int $model
 * @property int $color
 * @property string $displacement
 * @property string $frame_no
 * @property string $engine_no
 * @property string $reg_no
 * @property string $vehicle_type
 * @property string $thumb_left
 * @property string $left_iso_template
 * @property string $left_ansi_template
 * @property string $thumb_right
 * @property string $right_iso_template
 * @property string $right_ansi_template
 * @property string $citizenship_number
 * @property string $jaari_date
 * @property string $mobile_no
 * @property string $inspection_report
 * @property string $citizenship_no
 * @property string $vat_doc
 * @property string $owner_citizenship
 * @property string $certificate
 * @property int $fk_branch
 * @property int $fk_user
 * @property int $fk_organization
 * @property int $status
 * @property string $created_date
 */
class Saleform extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saleform';
    }

    /**
     * {@inheritdoc}
     */
    public $email;
    public $type;
    public $e_name;
    public $e_mobile;
    public $message;

    const COMPANY=1;
    const PERSONAL=2;
    const TWO_WHEELER=2;
    const THREE_WHEELER=3;
    public $inspection_file;
    public $citizenship_file;
    public $Vat_file;
    public $owner_citizenship_file;
    public $certificate_file;
    public $checkbox;
    public $pro;
    public $dis;
    public $mun;
    public $same_ward;
    public $thumbLeft;
    public $thumbRight;     
    public $latitude;
    public $longitude;
    public $location;
    public function rules()
    {
        return [
            [['name', 'p_province', 'p_district', 'p_municipal', 'p_ward','total_amt', 'paid_amt','completion_date', 'brand', 'model', 'color', 'displacement', 'frame_no', 'engine_no', 'reg_no', 'vehicle_type','citizenship_number', 'jaari_date', 'mobile_no'], 'required'],
            [['finance','checkbox','p_province','type','buyer_type','p_district', 'p_municipal', 'p_ward', 't_province', 't_district', 't_municipal', 't_ward', 'brand', 'model', 'color', 'fk_branch', 'fk_user', 'fk_organization', 'status'], 'integer'],
            [['pro','dis','mun','same_ward','mail','email','e_name','e_mobile','name', 'total_amt', 'paid_amt', 'due_amt', 'completion_date', 'displacement', 'frame_no', 'engine_no', 'reg_no', 'vehicle_type','citizenship_number', 'jaari_date', 'mobile_no', 'inspection_report', 'citizenship_no', 'vat_doc', 'owner_citizenship', 'certificate', 'created_date','father_name'], 'string', 'max' => 255],
            [['inspection_file','citizenship_file','Vat_file','owner_citizenship_file','certificate_file'],'file','extensions'=>'png,jpg'],
            [['location','thumbLeft','thumbRight','thumb_left', 'left_iso_template', 'left_ansi_template', 'thumb_right', 'right_iso_template', 'right_ansi_template','lat','lng','latitude','longitude','message'],'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'e_name'=>'Name',
            'e_mobile'=>'Contact No.',
            'p_province' => 'Province',
            'p_district' => 'District',
            'p_municipal' => 'Municipal',
            'p_ward' => 'Ward',
            't_province' => 'Province',
            't_district' => 'District',
            't_municipal' => 'Municipal',
            't_ward' => 'Ward',
            'pro' => 'Province',
            'dis' => 'District',
            'mun' => 'Municipal',
            'same_ward' => 'Ward',
            'total_amt' => 'Total Amountt',
            'paid_amt' => 'Paid Amountt',
            'due_amt' => 'Due Amount',
            'completion_date' => 'Completion Date',
            'brand' => 'Brand',
            'model' => 'Model',
            'color' => 'Color',
            'displacement' => 'Displacement',
            'frame_no' => 'Frame No.',
            'engine_no' => 'Engine No.',
            'reg_no' => 'Reg No.',
            'vehicle_type' => 'Vehicle Type',
            'thumb_left' => 'Thumb Left',
            'left_iso_template' => 'Left Iso Template',
            'left_ansi_template' => 'Left Ansi Template',
            'thumb_right' => 'Thumb Right',
            'right_iso_template' => 'Right Iso Template',
            'right_ansi_template' => 'Right Ansi Template',
            'citizenship_number' => 'Citizenship Number',
            'jaari_date' => 'Ongoing Date',
            'mobile_no' => 'Mobile No.',
            'inspection_file' => 'Inspection Report',
            'citizenship_file' => 'Citizenship',
            'Vat_file' => 'VAT Document',
            'owner_citizenship_file' => 'Owner Citizenship',
            'certificate_file' => 'Certificate',
            'fk_branch' => 'Branch',
            'fk_user' => 'User',
            'fk_organization' => 'Fk Organization',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'mail'=>'email',
            'finance'=>'Payment Type',
            'father_name'=>'Father Name',
        ];
    }
    public static function getBuyerType(){
        return [
            self::COMPANY=>'Company',
            self::PERSONAL=>'Personal',

        ];
    }

    public function getModel() {
        return $this->hasOne(VehicleModel::className(), ['id' => 'model']);
    }

    public function getVehicletype(){
        return [
            self::TWO_WHEELER=>'Two Wheeler',
            self::THREE_WHEELER=>'Three Wheeler',
        ];
    }
}
