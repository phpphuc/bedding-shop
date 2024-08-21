<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $video_id
 * @property string $image
 * @property int $number
 * @property int $status
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vi', 'parent', 'video_id'], 'required'],
            [['name_vi', 'name_en', 'image'], 'string'],
            [['number', 'status'], 'integer'],
            [['video_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Thuộc về danh mục',
            'name_vi' => 'Tiêu đề (Vi)',
            'name_en' => 'Tiêu đề (En)',
            'video_id' => 'Video ID',
            'image' => 'Hình ảnh',
            'number' => 'Thứ tự',
            'status' => 'Hiển thị',
        ];
    }
    
    public function getCategoryParent() {
        return $this->hasOne(Videoscat::className(), ['id' => 'parent']);
    }
}
