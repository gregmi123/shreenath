<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emp_post".
 *
 * @property int $id
 * @property string $post
 * @property int $fk_organization_id
 * @property int $fk_user_id
 * @property string $created_date
 */
class EmpPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emp_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post', 'fk_organization_id', 'fk_user_id', 'created_date'], 'required'],
            [['fk_organization_id', 'fk_user_id'], 'integer'],
            [['post'], 'string', 'max' => 250],
            [['created_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post' => 'Post',
            'fk_organization_id' => 'Fk Organization ID',
            'fk_user_id' => 'Fk User ID',
            'created_date' => 'Created Date',
        ];
    }
}
