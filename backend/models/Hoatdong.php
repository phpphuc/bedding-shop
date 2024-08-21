<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hoatdong".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $des_vi
 * @property string $des_en
 * @property string $thumb
 */
class Hoatdong extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hoatdong';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['des_vi', 'des_en', 'thumb'], 'string'],
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
            'thumb' => 'Hình ảnh',
        ];
    }
}
