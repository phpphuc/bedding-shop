<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bacsi".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $des_vi
 * @property string $des_en
 * @property string $content_vi
 * @property string $content_en
 * @property string $slug
 * @property string $image
 * @property int $number
 */
class Bacsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bacsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vi', 'des_vi'], 'required'],
            [['des_vi', 'des_en', 'content_vi', 'content_en', 'slug', 'image'], 'string'],
            [['number'], 'integer'],
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
            'des_vi' => 'Mô tả (Vi)',
            'des_en' => 'Mô tả (En)',
            'content_vi' => 'Nội dung (Vi)',
            'content_en' => 'Nội dung (En)',
            'slug' => 'Liên kế',
            'image' => 'Hình ảnh',
            'number' => 'Thứ tự',
        ];
    }
}
