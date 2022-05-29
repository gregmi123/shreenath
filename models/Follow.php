<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "follow".
 *
 * @property int $id
 * @property string $reamarks
 * @property string $previous_date
 * @property string $updated_date
 * @property int $fk_enquiry
 * @property int $fk_user
 * @property int $fk_branch
 * @property int $status
 */
class Follow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'follow';
    }

    /**
     * {@inheritdoc}
     */
    public $mail;
    public $message;
    public function rules()
    {
        return [
            [['reamarks', 'previous_date', 'updated_date', 'fk_enquiry', 'fk_user', 'fk_branch', 'status'], 'required'],
            [['fk_enquiry', 'fk_user', 'fk_branch', 'status','fk_organization'], 'integer'],
            [['reamarks', 'previous_date', 'updated_date','mail','message'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reamarks' => 'Reamarks',
            'previous_date' => 'Previous Date',
            'updated_date' => 'Updated Date',
            'fk_enquiry' => 'Fk Enquiry',
            'fk_user' => 'Fk User',
            'fk_branch' => 'Fk Branch',
            'status' => 'Status',
        ];
    }
}
