<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $order_id
 * @property string $buyer_name
 * @property string $buyer_email
 * @property int $order_amount
 * @property int $status
 * @property string $created_at
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'order_amount', 'status'], 'integer'],
            [['buyer_name', 'buyer_email'], 'required'],
            [['created_at'], 'safe'],
            [['buyer_name', 'buyer_email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'buyer_name' => 'Buyer Name',
            'buyer_email' => 'Buyer Email',
            'order_amount' => 'Order Amount',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
