<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products_op".
 *
 * @property int $id
 * @property int $parent
 * @property string $name_vi
 * @property string $name_en
 * @property string $value_vi
 * @property string $value_en
 *
 * @property Products $parent0
 */
class ProductsOp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_op';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vi', 'value_vi'], 'required'],
            [['parent'], 'integer'],
            [['name_vi', 'name_en', 'value_vi', 'value_en'], 'string'],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['parent' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Thuộc về sản phẩm',
            'name_vi' => 'Tiêu đề (Vi)',
            'name_en' => 'Tiêu đề (En)',
            'value_vi' => 'Giá trị (Vi)',
            'value_en' => 'Giá trị (En)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Products::className(), ['id' => 'parent']);
    }
}
