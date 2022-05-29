<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizations".
 *
 * @property int $id
 * @property string $name_nepali
 * @property string $name_english
 * @property string $phone
 * @property string|null $email
 * @property string|null $fax
 * @property int $fk_province
 * @property int $fk_district
 * @property int $fk_municipal
 * @property int $fk_ward
 * @property string $tol
 * @property string $org_code
 * @property string $created_date
 * @property string|null $last_updated_date
 */
class Organizations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_nepali', 'name_english', 'phone', 'fk_province', 'fk_district', 'fk_municipal', 'fk_ward', 'tol', 'org_code', 'created_date'], 'required'],
            [['fk_province', 'fk_district', 'fk_municipal', 'fk_ward'], 'integer'],
            [['name_nepali', 'name_english', 'email', 'fax', 'tol'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 50],
            [['org_code', 'created_date', 'last_updated_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_nepali' => 'Name Nepali',
            'name_english' => 'Name English',
            'phone' => 'Phone',
            'email' => 'Email',
            'fax' => 'Fax',
            'fk_province' => 'Fk Province',
            'fk_district' => 'Fk District',
            'fk_municipal' => 'Fk Municipal',
            'fk_ward' => 'Fk Ward',
            'tol' => 'Tol',
            'org_code' => 'Org Code',
            'created_date' => 'Created Date',
            'last_updated_date' => 'Last Updated Date',
        ];
    }
}
