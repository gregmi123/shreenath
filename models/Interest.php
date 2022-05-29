<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interest".
 *
 * @property int $id
 * @property float $rate
 * @property int $fk_branch
 * @property int $fk_user_id
 * @property int $status
 * @property string $created_date
 * @property int $fk_organization
 */
class Interest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rate', 'fk_branch', 'fk_user_id', 'status', 'created_date', 'fk_organization'], 'required'],
            [['rate'], 'number'],
            [['fk_branch', 'fk_user_id', 'status', 'fk_organization'], 'integer'],
            [['created_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate' => 'Rate',
            'fk_branch' => 'Fk Branch',
            'fk_user_id' => 'Fk User ID',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'fk_organization' => 'Fk Organization',
        ];
    }
}
