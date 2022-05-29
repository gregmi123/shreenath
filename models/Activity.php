<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property int $fk_employee
 * @property string $remarks
 * @property int $fk_user_id
 * @property int $fk_branch_id
 * @property int $fk_organization_id
 * @property string|null $in_date
 * @property string|null $out_date
 * @property int $status
 * @property string $created_date
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    const IN=1;
    const OUT=2;
    public function rules()
    {
        return [
            [['fk_employee', 'remarks','status'], 'required'],
            [['fk_employee', 'fk_user_id', 'fk_branch_id', 'fk_organization_id', 'status'], 'integer'],
            [['remarks', 'in_date', 'out_date', 'created_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_employee' => 'Employee',
            'remarks' => 'Remarks',
            'fk_user_id' => 'Fk User ID',
            'fk_branch_id' => 'Fk Branch ID',
            'fk_organization_id' => 'Fk Organization ID',
            'in_date' => 'In Time',
            'out_date' => 'Out Time',
            'status' => 'Status',
            'created_date' => 'Created Date',
        ];
    }

    public function getInout(){
        return [
            Activity::IN=>'IN',
            Activity::OUT=>'OUT'
        ];
    }
}
