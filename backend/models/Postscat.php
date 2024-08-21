<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "postscat".
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
 * @property int $status
 * @property int $homepage
 * @property int $position
 * @property int $number
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $created_date
 */
class Postscat extends \yii\db\ActiveRecord implements \mrssoft\sitemap\SitemapInterface {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'postscat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['parent', 'status', 'homepage', 'position', 'number'], 'integer'],
            [['name_vi', 'slug', 'parent'], 'required'],
            ['slug', 'unique'],
            ['slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
            [['des_vi', 'des_en', 'content_vi', 'content_en', 'slug', 'image', 'title', 'description', 'keyword'], 'string'],
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
            'image' => 'Hình ảnh',
            'homepage' => 'Trang chủ',
            'position' => 'Vị trí',
            'number' => 'Thứ tự',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'created_date' => 'Created Date',
            'status' => 'Hiển thị',
        ];
    }

    public function getParentName() {
        return $this->hasOne(Postscat::className(), ['id' => 'parent']);
    }

    public $arrCate = array();

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

    public $parentId;

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
        return \yii\helpers\Url::toRoute(['posts/index', 'slug' => $this->slug], true);
    }

}
