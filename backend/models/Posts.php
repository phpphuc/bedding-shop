<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "posts".
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
 * @property string $image
 * @property string $icon
 * @property int $status
 * @property int $feature
 * @property int $number
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 */
class Posts extends \yii\db\ActiveRecord implements \mrssoft\sitemap\SitemapInterface {

    /**
     * {@inheritdoc}
     */
//    public static function tableName() {
//        return 'posts';
//    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['parent', 'status', 'feature', 'number', 'views'], 'integer'],
            [['name_vi', 'slug', 'parent'], 'required'],
            ['slug', 'unique'],
            ['slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
            [['des_vi', 'des_en', 'content_vi', 'content_en', 'slug', 'image', 'icon', 'title', 'description', 'keyword', 'tag', 'tag_compare'], 'string'],
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
            'parent' => 'Thuộc về danh mục',
            'name_vi' => 'Tiêu đề (Vi)',
            'name_en' => 'Tiêu đề (En)',
            'des_vi' => 'Mô tả ngắn (Vi)',
            'des_en' => 'Mô tả ngắn (En)',
            'content_vi' => 'Nội dung (Vi)',
            'content_en' => 'Nội dung (En)',
            'slug' => 'Liên kết',
            'image' => 'Hình ảnh',
            'icon' => 'Icon',
            'status' => 'Hiển thị',
            'feature' => 'Nổi bật',
            'number' => 'Thứ tự',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'created_date' => 'Created Date',
            'tag' => 'Tag (Ex: tag1,tag2,tag3...)',
        ];
    }

    public function getCategoryParent() {
        return $this->hasOne(Postscat::className(), ['id' => 'parent']);
    }
    
    public function getTags() {
        $arrTags = array();
        $posts = $this->findAll(['status' => 1]);
        if ($posts) {
            foreach ($posts as $key => $value) {
                if (!empty($value['tag_compare'])) {
                    $arr = explode(',', $value['tag_compare']);
                    foreach (array_unique($arr) as $valueT) {
                        array_push($arrTags, $valueT);
                    }
                }
            }
        }
        return array_unique($arrTags);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->created_date = date('Y-m-d H:i:s', time());
            if (!empty($this->tag)) {
                $this->tag_compare = \Yii::$app->MyComponent->utf8convert(str_replace(" ", "-", $this->tag));
            } else {
                $this->tag_compare = NULL;
            }
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
        return \yii\helpers\Url::toRoute(['posts/view', 'slug' => $this->slug], true);
    }

}
