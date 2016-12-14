<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $backenduserid
 * @property integer $stockid
 * @property string $timestamp
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['backenduserid', 'stockid'], 'integer'],
            [['timestamp'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'backenduserid' => 'Backenduserid',
            'stockid' => 'Stockid',
            'timestamp' => 'Timestamp',
        ];
    }
}
