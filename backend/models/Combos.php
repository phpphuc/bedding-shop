<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "combos".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $des_vi
 * @property string $des_en
 * @property string $content_vi
 * @property string $content_en
 * @property string $image
 * @property string $thumb
 * @property string $slug
 * @property int $parent
 * @property int $number
 * @property int $price
 * @property int $price_promotion
 * @property int $feature
 * @property int $new
 * @property int $bestseller
 * @property int $promotion
 * @property int $status
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $tag
 * @property string $created_date
 */
class Combos extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'combos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name_vi', 'parent', 'slug'], 'required'],
            ['slug', 'unique'],
            ['slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
            [['des_vi', 'des_en', 'content_vi', 'content_en', 'image', 'thumb', 'slug', 'title', 'description', 'keyword'], 'string'],
            [['parent', 'number', 'price', 'price_promotion', 'feature', 'status'], 'integer'],
            [['created_date'], 'safe'],
            [['name_vi', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name_vi' => 'Tiêu đề (Vi)',
            'name_en' => 'Tiêu đề (En)',
            'des_vi' => 'Mô tả (Vi)',
            'des_en' => 'Mô tả (En)',
            'content_vi' => 'Nội dung (Vi)',
            'content_en' => 'Nội dung (En)',
            'image' => 'Hình ảnh',
            'thumb' => 'Thumbnail',
            'slug' => 'Liên kết',
            'parent' => 'Thuộc về danh mục',
            'number' => 'Thứ tự',
            'price' => 'Tổng giá trị',
            'price_promotion' => 'Giá bán',
            'feature' => 'Nổi bật',
            'status' => 'Hiển thị',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'created_date' => 'Created Date'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryParent() {
        return $this->hasOne(Comboscat::className(), ['id' => 'parent']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->created_date = date('Y-m-d H:i:s', time());
            if (empty($this->price)) {
                $this->price = 0;
            }
            if (empty($this->price_promotion)) {
                $this->price_promotion = 0;
            }
        }
        return true;
    }

}
