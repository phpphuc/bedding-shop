<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "camnhan".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $des_vi
 * @property string $des_en
 * @property string $content_vi
 * @property string $content_en
 * @property string $image
 * @property int $number
 * @property int $status
 */
class Camnhan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'camnhan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vi'], 'required'],
            [['des_vi', 'des_en', 'content_vi', 'content_en', 'image'], 'string'],
            [['number', 'status','danhgia'], 'integer'],
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
            'des_vi' => 'Mô tả(Vi)',
            'des_en' => 'Mô tả(En)',
            'content_vi' => 'Ý kiến(Vi)',
            'content_en' => 'Ý kiến(En)',
            'image' => 'Hình ảnh',
            'number' => 'Thứ tự',
            'danhgia' =>'Điểm đánh giá',
            'status' => 'Vị trí',
        ];
    }
}
