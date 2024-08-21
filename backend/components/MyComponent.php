<?php

namespace backend\components;

use Yii;
use yii\base\Component;

class MyComponent extends Component {
    
    public $watermark = 0;
    public $lang_num = 2;
    public $website;
    public $config;

    public function init() {
        $this->website = \backend\models\Config::findOne(1);
        $this->config = \yii\helpers\ArrayHelper::map(\backend\models\Configs::find()->all(), 'key', 'value');
        parent::init();
    }

    public function convertCurrency($amount, $from, $to) {
        $conv_id = "{$from}_{$to}";
        $string = file_get_contents("http://free.currencyconverterapi.com/api/v3/convert?q=$conv_id&compact=ultra");
        $json_a = json_decode($string, true);

        return $amount * round($json_a[$conv_id], 4);

        // Use echo Yii::$app->MyComponent->convertCurrency(1,'USD','VND');
    }

    public function utf8convert($str) {

        if (!$str)
            return false;

        $utf8 = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ|Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );

        foreach ($utf8 as $ascii => $uni)
            $str = preg_replace("/($uni)/i", $ascii, $str);

        return $str;
    }
    
    public function watermarkImage($image) {
        $watermarkImage = $this->website['logo'];
        try {
            $imagine = new \common\components\ImageTools;
            $tools = $imagine->getImagine();
            $openImage = $tools->open(Yii::getAlias('@rootpath' . $image));
            $openWatermark = $tools->open(Yii::getAlias('@rootpath' . $watermarkImage));

            if ($openImage->getSize()->getWidth() < $openWatermark->getSize()->getWidth() || $openImage->getSize()->getHeight() < $openWatermark->getSize()->getHeight()) {
                $t = $openImage->getSize()->getHeight() / $openWatermark->getSize()->getHeight();
                if (round($t * $openWatermark->getSize()->getWidth()) <= $openImage->getSize()->getWidth()) {
                    $openWatermark->resize(new \Imagine\Image\Box(round($t * $openWatermark->getSize()->getWidth()), $openImage->getSize()->getHeight()));
                } else {
                    $t = $openImage->getSize()->getWidth() / $openWatermark->getSize()->getWidth();
                    $openWatermark->resize(new \Imagine\Image\Box($openImage->getSize()->getWidth(), round($t * $openWatermark->getSize()->getHeight())));
                }
            }

            // Top - Left
            //$position = [10, 10];
            // Top - Right
            $position = [$openImage->getSize()->getWidth() - $openWatermark->getSize()->getWidth() - 10, 10];
            //Bottom - Left
            //$position = [10, $openImage->getSize()->getHeight() - $openWatermark->getSize()->getHeight()];
            //Bottom - Right
            //$position = [$openImage->getSize()->getWidth() - $openWatermark->getSize()->getWidth(), $openImage->getSize()->getHeight() - $openWatermark->getSize()->getHeight()];
            //Center
            //$position = [round(($openImage->getSize()->getWidth() - $openWatermark->getSize()->getWidth()) / 2), round(($openImage->getSize()->getHeight() - $openWatermark->getSize()->getHeight()) / 2)];

            $newImage = \yii\imagine\Image::watermark('@rootpath' . $image, '@rootpath' . $watermarkImage, $position);
            $newImage->save(Yii::getAlias('@webroot/watermark/' . basename($image)));
            return Yii::getAlias('@web/watermark/' . basename($image));
        } catch (\Exception $exception) {
            return $image;
        }
    }

}
?>

