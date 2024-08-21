<?php

use yii\helpers\Html;
use Imagine\Image\ManipulatorInterface;
use backend\models\Slideshowcat;
use backend\models\Slideshow;

$camketmuahang = Slideshowcat::find()->where(['homepage' => 1, 'id' => 3])->orderBy('id desc')->one();
if ($camketmuahang) {
    $nameDM = $camketmuahang['name_' . Yii::$app->language];
    $desDM = $camketmuahang['des_' . Yii::$app->language];
    $imgDM = $camketmuahang['image'];
    $newAllcamket = Slideshow::find()->where('homepage = 1 and parent = ' . $camketmuahang['id'])->orderBy('id desc')->asArray()->all();
    ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="title_camket text-center">
                <h3><?= $nameDM ?></h3>
                <p><?= $desDM; ?></p>
            </div>
            <div>
                <?php
                if ($newAllcamket) {
                    $stt = 0;
                    foreach ($newAllcamket as $items2) :
                        $stt++;
                        $linkN2 = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items2['slug']);
                        $nameN2 = $items2['name_' . Yii::$app->language];
                        $desN2 = $items2['des_' . Yii::$app->language];
                        ?>
                        <div class="name_camket">
                            <i class="far fa-check-circle"></i> <?= $nameN2 ?>
                        </div>
                        <?php
                    endforeach;
                }
                ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
            <div class="hinh_camketright">
                <div class="hinhconcamket">
                <img src="<?= $imgDM ?>" alt="<?= $nameDM ?>" />
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>