<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_details".
 *
 * @property int $id
 * @property int $fk_sale
 * @property string $title
 * @property string $amount
 * @property string $remarks
 */
class PaymentDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'amount', 'remarks'], 'required'],
            [['fk_sale'], 'integer'],
            [['title', 'amount', 'remarks'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_sale' => 'Fk Sale',
            'title' => 'Title',
            'amount' => 'Amount',
            'remarks' => 'Remarks',
        ];
    }
}
