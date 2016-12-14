<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backendusers".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $token
 * @property string $expiredate
 * @property string $firstname
 * @property string $lastname
 */
class Backendusers extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'backendusers';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['email', 'password', 'firstname', 'lastname'], 'required'],
            [['expiredate'],'integer'],
            [['email', 'address', 'city', 'country', 'firstname', 'lastname'], 'string', 'max' => 64],
            [['password'], 'string', 'min' => 7, 'max' => 128],
            [['token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'token' => 'Token',
            'expiredate' => 'Expiredate',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
        ];
    }

 
    public function getId() {
        return $this->id;
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findByEmail($username) {
        return self::findOne(['email' => $username]);
    }

   public function setPassword($password) {

        $this->password = Yii::$app->security->generatePasswordHash($password);
        
    }

    public function validatePassword($password) {
        return $this->password === $password;
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException();
    }

    public function actionRegister() {
        return $this->render('register');
    }
    
}
