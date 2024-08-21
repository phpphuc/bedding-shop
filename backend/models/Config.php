<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property int $ID
 * @property string $name_vi
 * @property string $name_en
 * @property string $phone
 * @property string $address_vi
 * @property string $email
 * @property string $fanpage
 * @property string $website
 * @property string $map
 * @property string $address_en
 * @property string $title
 * @property string $keyword
 * @property string $description
 * @property string $logo
 * @property string $favicon
 * @property string $banner
 * @property int $lang
 * @property string $headtag
 * @property string $bodytag
 * @property string $heading
 * @property string $customcss
 */
class Config extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name_vi'], 'required'],
            [['address_vi', 'fanpage', 'website', 'map', 'address_en', 'title', 'keyword', 'description', 'logo', 'favicon', 'banner', 'headtag', 'bodytag', 'heading', 'customcss', 'schema'], 'string'],
            [['lang'], 'integer'],
            [['name_vi', 'name_en', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'name_vi' => 'Tiêu đề (Vi)',
            'name_en' => 'Tiêu đề (En)',
            'phone' => 'Điện thoại',
            'address_vi' => 'Địa chỉ (Vi)',
            'address_en' => 'Địa chỉ (En)',
            'email' => 'Email',
            'fanpage' => 'Fanpage',
            'website' => 'Website',
            'map' => 'Tạo độ Map',
            'title' => 'Title',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'logo' => 'Logo',
            'favicon' => 'Favicon',
            'banner' => 'Banner',
            'lang' => 'Ngôn ngữ',
            'headtag' => 'Head Tag',
            'bodytag' => 'Body Tag',
            'heading' => 'Heading Tag (h2,h3,h4,h5,h6)',
            'customcss' => 'Tùy chỉnh Css',
            'schema' => 'Schema.org',
        ];
    }

}
