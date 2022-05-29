<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property int $id
 * @property string $model
 */
class VehicleModel extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['model', 'fk_brand'], 'required'],
            [['model'], 'string', 'max' => 250],
            [['fk_brand'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'fk_brand' => 'Brand',
        ];
    }

    public static function getModels($cat_id) {
        $query = self::find()
                ->select('id,model as name')
                ->where(['fk_brand' => $cat_id])
                ->asArray()
                ->all();
        return $query;
    }

    public function getBrand() {
        return $this->hasOne(Brand::className(), ['id' => 'fk_brand']);
    }

}
