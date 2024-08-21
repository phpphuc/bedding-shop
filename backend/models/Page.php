<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "page".
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
 * @property int $status
 * @property int $homepage
 * @property int $number
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 */
class Page extends \yii\db\ActiveRecord implements \mrssoft\sitemap\SitemapInterface {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name_vi', 'slug'], 'required'],
            [['des_vi', 'des_en', 'content_vi', 'content_en', 'slug', 'image', 'title', 'description', 'keyword'], 'string'],
            [['status', 'homepage', 'position', 'number'], 'integer'],
            ['slug', 'unique'],
            ['slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
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
            'des_vi' => 'Mô tả ngắn (Vi)',
            'des_en' => 'Mô tả ngắn (En)',
            'content_vi' => 'Nội dung (Vi)',
            'content_en' => 'Nội dung (En)',
            'slug' => 'Liên kết',
            'image' => 'Hình ảnh',
            'status' => 'Hiển thị',
            'homepage' => 'Trang chủ',
            'number' => 'Thứ tự',
            'position' => 'Vị trí',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'created_date' => 'Created Date',
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->created_date = date('Y-m-d H:i:s', time());
        }
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function sitemap() {
        return self::find()->where('status = 1');
    }

    /**
     * @return string
     */
    public function getSitemapUrl() {
        return \yii\helpers\Url::toRoute(['page/index', 'slug' => $this->slug], true);
    }

}
