<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "videoscat".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property int $number
 * @property int $parent
 */
class Videoscat extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'videoscat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name_vi', 'slug'], 'required'],
            [['name_vi', 'name_en', 'slug', 'title', 'description', 'keyword'], 'string'],
            ['slug', 'unique'],
            ['slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
            [['number', 'parent'], 'integer'],
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
            'slug' => 'Liên kết',
            'number' => 'Thứ tự',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'parent' => 'Thuộc về danh mục',
        ];
    }

    public function getParentName() {
        return $this->hasOne(Videoscat::className(), ['id' => 'parent']);
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

}
