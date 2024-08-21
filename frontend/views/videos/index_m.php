<?php

use TonchikTm\Yii2Thumb\ImageThumb;

/* @var $this yii\web\View */
$this->title = 'Videos';
?>

<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-md-12">
                <div class="mybreadcrumb">
                    <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                    <a class="mybreadcrumb__step" href="javascript:;"><span>Videos</span></a>
                </div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($models) {
            $stt = 0;
            foreach ($models as $key => $value) {
                $stt++;
                $name = $value['name_' . Yii::$app->language];
                $img = $value['image'];
                $videoId = $value['video_id'];
                ?>
                <div class="col-xs-12 margin-bottom-20 wow fadeInDown text-center">
                    <div class="_itemsContainer">
                        <a data-fancybox="videos" href="https://www.youtube.com/watch?v=<?= $videoId; ?>">
                            <?= ImageThumb::thumbPicture($img, 278, 250, ['source' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $name, 'class' => 'lazy']]]); ?>
                            <div class="_play"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/frontend/web/images/iconplay.png'), 84, 85, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_INSET], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => 'icon play', 'class' => 'lazy']]]); ?></div>
                        </a>
                    </div>
                    <div class="_name-vd"><?= $name; ?></div>
                </div>
                <?php
                if ($stt % 4 == 0) {
                    ?>
                    <div class="clearfix"></div>
                    <?php
                }
            }
        }
        ?> 
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <?=
            yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </div>
    </div>
</div>
<div class="clearfix margin-bottom-20"></div>