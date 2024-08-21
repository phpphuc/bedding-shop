<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $product_id
 * @property string $product_name
 * @property string $product_image
 * @property int $product_price
 * @property int $product_quantity
 * @property int $product_cost
 *
 * @property Customers $customer
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
            [['customer_id', 'product_id', 'product_name'], 'required'],
            [['customer_id', 'product_id', 'product_price', 'product_quantity', 'product_cost'], 'integer'],
            [['product_name', 'product_image'], 'string'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'product_id' => 'Product ID',
            'product_name' => 'Tên sản phẩm',
            'product_image' => 'Hình ảnh',
            'product_price' => 'Giá',
            'product_quantity' => 'Số lượng',
            'product_cost' => 'Thành tiền',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customer_id']);
    }
}
