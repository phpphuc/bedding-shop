<?php

use TonchikTm\Yii2Thumb\ImageThumb;

/* @var $this yii\web\View */
$this->title = $model['name_' . Yii::$app->language];
?>

<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-md-12">
                <div class="mybreadcrumb">
                    <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                    <a class="mybreadcrumb__step" href="<?= Yii::$app->urlManager->createUrl('/thu-vien'); ?>"><?= Yii::t('app', 'Library') ?></a>
                    <a class="mybreadcrumb__step" href="javascript:;"><span><?= Yii::$app->MyComponent->myTruncate($model['name_' . Yii::$app->language], 50, " ", "..."); ?></span></a>
                </div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2><?= $model['name_' . Yii::$app->language]; ?></h2>
            </div>
        </div>
        <div class="clearfix margin-bottom-10"></div>
        <div class="row">
            <div class="col-md-12 margin-bottom-20">
                <div><a data-fancybox="gallery" href="<?= $model['image']; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $model['image']), 556, 400, ['source' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $model['name_' . Yii::$app->language], 'class' => 'lazy']]]); ?></a></div>
            </div>
            <?php
            if ($model['thumb']) {
                $stt = 1;
                $arrImg = explode(',', rtrim($model['thumb'], ","));
                foreach ($arrImg as $items_img) {
                    $stt++;
                    ?>
                    <div class="col-md-12 margin-bottom-20">
                        <div><a data-fancybox="gallery" href="<?= $items_img; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $items_img), 556, 400, ['source' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $model['name_' . Yii::$app->language], 'class' => 'lazy']]]); ?></a></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="clearfix margin-bottom-10"></div>
        <?php
        if ($postsOther) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="grid newdefault">
                        <div class="title">Album khác</div>
                        <div class="_autoplay">
                            <?php
                            foreach ($postsOther as $related) {
                                $linkN = Yii::$app->urlManager->createUrl('/thu-vien/' . $related['slug']);
                                $nameN = $related['name_' . Yii::$app->language];
                                $imgN = $related['image'];
                                ?>
                                <div>
                                    <div><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgN), 278, 200, ['source' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameN, 'class' => 'lazy']]]); ?></a></div>
                                    <div class="_namett-detail text-center" style="margin-top: 10px;"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><h2><?= $nameN; ?></h2></a></div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>