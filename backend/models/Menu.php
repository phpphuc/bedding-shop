<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $parent
 * @property string $model
 * @property string $type
 * @property int $number
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model', 'model_id'], 'required'],
            [['parent', 'number', 'model_id'], 'integer'],
            [['type'], 'string'],
            [['model', 'name_vi', 'name_en'], 'string', 'max' => 255],
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
            'parent' => 'Thuộc về',
            'model' => 'Kiểu Menu',
            'model_id' => 'Item Menu',
            'type' => 'Type',
            'number' => 'Thứ tự',
        ];
    }
    
    public function getParentName() {
        return $this->hasOne(Menu::className(), ['id' => 'parent']);
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

    public function getAllId($model, $model_id) {
        if ($getParent = $this->findAll(['model' => $model, 'model_id' => $model_id])) {
            if ($getParent):
                foreach ($getParent as $cateParent) :
                    array_push($this->arrCate, $cateParent->id);
                    $this->getCateChild($cateParent->id);
                endforeach;
            endif;
        }
        return $this->arrCate;
    }
}
