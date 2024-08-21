<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slideshow".
 *
 * @property int $id
 * @property int $parent
 * @property string $name_vi
 * @property string $name_en
 * @property string $des_vi
 * @property string $des_en
 * @property string $content_vi
 * @property string $content_en
 * @property string $slug
 * @property string $link
 * @property string $image
 * @property string $thumb
 * @property int $number
 * @property int $homepage
 */
class Slideshow extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'slideshow';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['parent', 'number', 'homepage'], 'integer'],
			[['name_vi', 'slug', 'parent'], 'required'],
			[['des_vi', 'des_en', 'content_vi', 'content_en', 'slug', 'link', 'image', 'thumb'], 'string'],
			[['name_vi', 'name_en'], 'string', 'max' => 255],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'parent' => 'Thuộc về danh mục',
			'name_vi' => 'Tiêu đề (Vi)',
			'name_en' => 'Tiêu đề (En)',
			'des_vi' => 'Mô tả (Vi)',
			'des_en' => 'Mô tả (En)',
			'content_vi' => 'Nội dung (Vi)',
			'content_en' => 'Nội dung (En)',
			'slug' => 'Liên kết',
			'link' => 'Link',
			'image' => 'Hình ảnh (1349x480)',
			'thumb' => 'Thumbnail',
			'number' => 'Thứ tự',
			'homepage' => 'Trang chủ',
		];
	}

	public function getCategoryParent() {
		return $this->hasOne(Slideshowcat::className(), ['id' => 'parent']);
	}
}
