<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "chinhanh".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property int $number
 */
class Chinhanh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chinhanh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vi'], 'required'],
            [['name_vi', 'name_en'], 'string'],
            [['number'], 'integer'],
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
            'number' => 'Thứ tự',
        ];
    }
}
