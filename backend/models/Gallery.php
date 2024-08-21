<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $image
 * @property string $link
 * @property int $number
 * @property int $type
 * @property int $homepage
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vi', 'type'], 'required'],
            [['image', 'link'], 'string'],
            [['number', 'type', 'homepage'], 'integer'],
            [['name_vi', 'name_en'], 'string', 'max' => 255],
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
            'image' => 'Hình ảnh',
            'link' => 'Link',
            'number' => 'Thứ tự',
            'type' => 'Kiểu',
            'homepage' => 'Trang chủ',
        ];
    }
}
