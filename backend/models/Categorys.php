<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categorys".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $des_vi
 * @property string $des_en
 * @property string $content_vi
 * @property string $content_en
 * @property int $parent
 * @property string $slug
 * @property string $image
 * @property int $homepage
 * @property int $number
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 */
class Categorys extends \yii\db\ActiveRecord implements \mrssoft\sitemap\SitemapInterface {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'categorys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name_vi', 'slug', 'parent'], 'required'],
            [['des_vi', 'des_en', 'content_vi', 'content_en', 'slug', 'image', 'icon', 'banner', 'title', 'description', 'keyword'], 'string'],
            [['parent', 'homepage', 'number', 'status'], 'integer'],
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
            'parent' => 'Thuộc về danh mục',
            'slug' => 'Liên kết',
            'icon' => 'Icon',
            'image' => 'Hình ảnh',
            'banner' => 'Banner',
            'homepage' => 'Trang chủ',
            'number' => 'Thứ tự',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'created_date' => 'Created Date',
            'status' => 'Hiển thị',
        ];
    }

    public function getParentName() {
        return $this->hasOne(Categorys::className(), ['id' => 'parent']);
    }

    public $arrCate = array();
    public $parentId;

    public function getCateChild($cat_id) {
        if ($getParent = $this->findAll(['parent' => $cat_id])) {
            if ($getParent):
                foreach ($getParent as $cateParent) :
                    array_push($this->arrCate, $cateParent->id);
                    $this->getCateChild($cateParent->id);
                endforeach;
            endif;
        }
        return $this->arrCate;
    }

    public function getPreviousParent($id) {
        $model = $this->findOne(['id' => $id]);
        $this->parentId = $model['parent'];
        return $this->parentId;
    }

    public function getLastParent($id) {
        $model = $this->findOne(['id' => $id]);
        if ($model['parent']) {
            $this->getLastParent($model['parent']);
        } else {
            $this->parentId = $model['id'];
        }
        return $this->parentId;
    }

    public function getAllLastParent($id) {
        $model = $this->findOne(['id' => $id]);
        if ($model['parent']) {
            array_unshift($this->arrCate, $model['parent']);
            $this->getAllLastParent($model['parent']);
        }
        return $this->arrCate;
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
        return \yii\helpers\Url::toRoute(['products/cate', 'slug' => $this->slug], true);
    }

}
