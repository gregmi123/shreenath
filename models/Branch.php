<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property int $id
 * @property int $fk_organization_id
 * @property int $fk_province
 * @property int $fk_district
 * @property int $fk_municipal
 * @property int $fk_ward
 * @property string $tol
 * @property string $phone
 * @property string|null $email
 * @property string|null $fax
 * @property string $created_date
 * @property string|null $updated_date
 */
class Branch extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['fk_organization_id', 'fk_province', 'fk_district', 'fk_municipal', 'fk_ward', 'tol', 'phone', 'created_date'], 'required'],
            [['fk_organization_id', 'fk_province', 'fk_district', 'fk_municipal', 'fk_ward'], 'integer'],
            [['tol', 'email'], 'string', 'max' => 250],
            [['phone', 'fax', 'created_date', 'updated_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'fk_organization_id' => 'Fk Organization ID',
            'fk_province' => 'Province',
            'fk_district' => 'District',
            'fk_municipal' => 'Municipal',
            'fk_ward' => 'Ward',
            'tol' => 'Tol',
            'phone' => 'Phone',
            'email' => 'Email',
            'fax' => 'Fax',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    public function getProvince() {
        return $this->hasOne(Province::className(), ['id' => 'fk_province']);
    }

    public function getDistrict() {
        return $this->hasOne(District::className(), ['id' => 'fk_district']);
    }

    public function getMunicipal() {
        return $this->hasOne(Municipals::className(), ['id' => 'fk_municipal']);
    }

}
