<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property int $fk_organization_id
 * @property int $fk_branch_id
 * @property int $status
 * @property string $created_date
 * @property int|null $type
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    const ADMIN_USER = 0;
    const ORG_USER = 1;
    const BRANCH_USER = 2;

    public function rules() {
        return [
            [['username', 'password', 'auth_key', 'fk_organization_id', 'fk_branch_id', 'status', 'created_date'], 'required'],
            [['id', 'fk_organization_id', 'fk_branch_id', 'status', 'type'], 'integer'],
            [['username', 'password', 'auth_key'], 'string', 'max' => 250],
            [['created_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'fk_organization_id' => 'Organization ',
            'fk_branch_id' => 'Branch',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'type' => 'Type',
        ];
    }

    public function getOrganization() {
        return $this->hasOne(Organizations::className(), ['id' => 'fk_organization_id']);
    }

    public function getAuthKey(): string {
        return $this->auth_key;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool {
        return $this->auth_key === $authKey;
    }

    public static function findIdentity($id) {
        return self::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException();
    }

    public static function findByUsername($username) {
        // var_dump($username);die;
        return self::find()->where(['username' => $username])->andWhere(['status' => 1])->one();
    }

    public function validatePassword($password) {
        //var_dump($password);die;
        return $this->password === $password;
    }
    public function getBranch(){
        return $this->hasOne(Branch::className(), ['id'=>'fk_branch_id']);
    }
   

}
