<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property string $body
 *
 * @property Orders[] $orders
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'phone'], 'required'],
            [['address', 'body'], 'string'],
            [['status'], 'integer'],
            [['created_date'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Họ & tên',
            'email' => 'E-mail',
            'address' => 'Địa chỉ nhận hàng',
            'phone' => 'Điện thoại',
            'body' => 'Ghi chú đơn hàng',
            'created_date' => 'Ngày đặt hàng',
            'status' => 'Đã xử lý',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['customer_id' => 'id']);
    }
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->created_date = date('Y-m-d H:i:s', time());
        }
        return true;
    }
}
