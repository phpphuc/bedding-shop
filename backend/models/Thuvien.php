<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "thuvien".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $slug
 * @property string $image
 * @property string $thumb
 * @property int $number
 */
class Thuvien extends \yii\db\ActiveRecord implements \mrssoft\sitemap\SitemapInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thuvien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vi', 'slug'], 'required'],
            [['slug', 'image', 'thumb'], 'string'],
            ['slug', 'unique'],
            ['slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
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
            'slug' => 'Liên kết',
            'image' => 'Hình ảnh',
            'thumb' => 'Thumbnail',
            'number' => 'Thứ tự',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public static function sitemap() {
        return self::find();
    }

    /**
     * @return string
     */
    public function getSitemapUrl() {
        return \yii\helpers\Url::toRoute(['thuvien/view', 'slug' => $this->slug], true);
    }
}
