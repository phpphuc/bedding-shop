<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "configs".
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string $value
 * @property string $type
 * @property string $language
 */
class Configs extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'configs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'key', 'type'], 'required'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['key', 'type'], 'string', 'max' => 32],
            [['language'], 'string', 'max' => 5],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Tên',
            'key' => 'Từ khóa',
            'value' => 'Giá trị',
            'type' => 'Kiểu',
            'language' => 'Ngôn ngữ',
        ];
    }

}
