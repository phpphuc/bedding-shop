<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "camket".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $des_vi
 * @property string $des_en
 * @property string $image
 * @property int $number
 */
class Camket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'camket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vi'], 'required'],
            [['name_vi', 'name_en', 'des_vi', 'des_en', 'image'], 'string'],
            [['number'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_vi' => 'Tiêu đề (Vi)',
            'name_en' => 'Tiêu đề (En)',
            'des_vi' => 'Mô tả (Vi)',
            'des_en' => 'Mô tả (En)',
            'image' => 'Hình ảnh',
            'number' => 'Thứ tự',
        ];
    }
}
