<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "counter".
 *
 * @property int $id
 * @property string $ip_address
 * @property string $last_visit
 */
class Counter extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'counter';
    }

    public $tongso;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['ip_address'], 'required'],
            [['last_visit'], 'safe'],
            [['ip_address'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ip_address' => 'Địa chỉ Ip',
            'last_visit' => 'Ngày truy cập',
        ];
    }

}
