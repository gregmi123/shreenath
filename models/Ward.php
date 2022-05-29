<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ward".
 *
 * @property int $id
 * @property string $ward
 * @property int $fk_organization_id
 */
class Ward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ward';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ward', 'fk_organization_id'], 'required'],
            [['fk_organization_id'], 'integer'],
            [['ward'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ward' => 'Ward',
            'fk_organization_id' => 'Fk Organization ID',
        ];
    }
}
