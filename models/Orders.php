<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $stockname
 * @property string $country
 * @property string $city
 * @property string $address
 * @property integer $quantity
 * @property double $price
 * @property string $timestamp
 */
class Orders extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['lastname', 'country', 'city', 'address'], 'required'],
            [['quantity', 'timestamp'], 'integer'],
            [['price'], 'number'],
            [['firstname', 'lastname',], 'string', 'max' => 32],
            [['stockname'], 'string', 'max' => 128],
            [['country', 'city', 'address'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'stockname' => 'Stockname',
            'country' => 'Country',
            'city' => 'City',
            'address' => 'Address',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'timestamp' => 'Timestamp',
        ];
    }

}
