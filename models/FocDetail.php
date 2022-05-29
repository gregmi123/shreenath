<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foc_detail".
 *
 * @property int $id
 * @property int $fk_sale
 * @property string $product_name
 * @property string $quantity
 * @property string $received_date
 */
class FocDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foc_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'quantity'], 'required'],
            [['id', 'fk_sale'], 'integer'],
            [['product_name', 'quantity', 'received_date'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'product_name' => 'Product Name',
            'quantity' => 'Quantity',
            'received_date' => 'Received Date',
        ];
    }
}
