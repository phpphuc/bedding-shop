<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $des_vi
 * @property string $des_en
 * @property string $content_vi
 * @property string $content_en
 * @property string $image
 * @property string $thumb
 * @property string $slug
 * @property int $parent
 * @property int $number
 * @property int $price
 * @property int $price_promotion
 * @property int $feature
 * @property int $new
 * @property int $bestseller
 * @property int $promotion
 * @property int $status
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $tag
 * @property string $created_date
 */
class Products extends \yii\db\ActiveRecord implements \mrssoft\sitemap\SitemapInterface{

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name_vi', 'parent', 'slug'], 'required'],
            ['slug', 'unique'],
            ['slug', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
            [['des_vi', 'des_en', 'goidien', 'content_vi', 'content_en', 'image', 'thumb', 'slug', 'title', 'description', 'keyword', 'tag', 'tag_compare'], 'string'],
            [['parent', 'number', 'price', 'price_promotion', 'feature', 'new', 'bestseller', 'promotion', 'status', 'rating', 'ratecount', 'userrate', 'views', 'quantity'], 'integer'],
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
            'des_vi' => 'Mô tả (Vi)',
            'des_en' => 'Mô tả (En)',
            'content_vi' => 'Nội dung (Vi)',
            'content_en' => 'Nội dung (En)',
            'image' => 'Hình ảnh (484x550)',
            'thumb' => 'Thumbnail',
            'slug' => 'Liên kết',
            'parent' => 'Thuộc về danh mục',
            'number' => 'Thứ tự',
            'price' => 'Giá',
            'price_promotion' => 'Giá KM',
            'feature' => 'Nổi bật',
            'new' => 'Mới',
            'bestseller' => 'Bán chạy',
            'promotion' => 'Giá tốt',
            'status' => 'Hiển thị',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'tag' => 'Tag (Ex: tag1,tag2,tag3...)',
            'created_date' => 'Created Date',
            'rating' => 'Đánh giá trung bình',
            'ratecount' => 'Tổng đánh giá',
            'userrate' => 'Số lần đánh giá',
            'quantity' => 'Số lượng',
            'goidien' => 'Gọi điện giảm giá'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryParent() {
        return $this->hasOne(Categorys::className(), ['id' => 'parent']);
    }

    public function getTags() {
        $arrTags = array();
        $products = $this->findAll(['status' => 1]);
        if ($products) {
            foreach ($products as $key => $value) {
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

    public function watermark_pr_old() {
        $products = Products::find()->all();
        foreach ($products as $key => $value) {
            $product = Products::findOne(['id' => $value['id']]);
            $product->image = \Yii::$app->MyComponent->watermarkImage($product->image);
            //$product->image = '/backend/web/uploads/images/' . basename($product->image);
            $product->save();
        }
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->created_date = date('Y-m-d H:i:s', time());
            if (empty($this->price)) {
                $this->price = 0;
            }
            if (empty($this->price_promotion)) {
                $this->price_promotion = 0;
            }
            if (empty($this->quantity)) {
                $this->quantity = 1;
            }
            if (!empty($this->tag)) {
                $this->tag_compare = \Yii::$app->MyComponent->utf8convert(str_replace(" ", "-", $this->tag));
            } else {
                $this->tag_compare = "";
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
        return \yii\helpers\Url::toRoute(['products/view', 'slug' => $this->slug], true);
    }

}
