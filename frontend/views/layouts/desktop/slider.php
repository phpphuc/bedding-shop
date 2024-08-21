<?php

use backend\models\Slideshow;
use TonchikTm\Yii2Thumb\ImageThumb;
?>
<div class="_slide">
    <?php
    $slideshows = Slideshow::find()->where(['parent' => 1, 'homepage' => 1])->orderBy('number asc, id desc')->all();
    if ($slideshows) {
    ?>
        <div id="wowslider-container">
            <div class="ws_images">
                <ul>
                    <?php
                    $stt = 0;
                    foreach ($slideshows as $items_img) {
                        $link = $items_img['link'];
                    ?>
                        <li><a href="<?php echo $link; ?>" title="<?php echo $items_img['name_' . Yii::$app->language]; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $items_img['image']), 1349, 480, ['source' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $items_img['name_' . Yii::$app->language], 'class' => 'lazy', 'id' => 'wows_' . $stt]]]); ?></a></li>
                    <?php
                        $stt++;
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php
    }
    ?>
</div>