<?php

use yii\helpers\Html;
use Imagine\Image\ManipulatorInterface;
use backend\models\Slideshowcat;
use backend\models\Slideshow;

$giunetthanhxuan = Slideshowcat::find()->where(['homepage' => 1, 'id' => 2])->orderBy('id desc')->one();
if ($giunetthanhxuan) {
    $nameDM = $giunetthanhxuan['name_' . Yii::$app->language];
     $desDM = $giunetthanhxuan['des_' . Yii::$app->language];
   $newAllgiunet = Slideshow::find()->where('homepage = 1 and parent = ' . $giunetthanhxuan['id'])->orderBy('id desc')->asArray()->all();
    ?>

<div class="title_khachhang text-center">
    <h3><?= $nameDM ?></h3>
    <p><?= $desDM; ?></p>
</div>
    <div class="_autoplay text-center">
            <?php
            if ($newAllgiunet) {
                $stt = 0;
                foreach ($newAllgiunet as $items2) :
                    $stt++;
                    $linkN2 = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items2['slug']);
                    $nameN2 = $items2['name_' . Yii::$app->language];
                    $desN2 = $items2['des_' . Yii::$app->language];
                    $imgN2 = $items2['image'];
                
                        ?>
                        <div class="hinh_khachkhachhang">
                            <img src="<?= $imgN2 ?>" alt="<?= $nameN2 ?>"/>
                        </div>
                   <?php
                endforeach;
            }
            ?>

    </div>
    <?php
}
?>