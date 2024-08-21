<?php

use TonchikTm\Yii2Thumb\ImageThumb;

/* @var $this yii\web\View */
$this->title = 'Thư Viện';
?>

<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-md-12">
                <div class="mybreadcrumb">
                    <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                    <a class="mybreadcrumb__step" href="javascript:;"><span><?= Yii::t('app', 'Library') ?></span></a>
                </div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
        <?php
        if ($models) {
            foreach ($models as $keyN => $valueN) {
                $linkN = Yii::$app->urlManager->createUrl('/thu-vien/' . $valueN['slug']);
                $nameN = $valueN['name_' . Yii::$app->language];
                $imgN = $valueN['image'];
                ?>
                <div class="col-md-12 margin-bottom-20">
                    <div><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgN), 556, 400, ['source' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameN, 'class' => 'lazy']]]); ?></a></div>
                    <div class="_namett-detail text-center" style="margin-top: 10px;"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><h2><?= $nameN; ?></h2></a></div>
                </div>
                <?php
            }
        }
        ?>
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
</div>
<div class="clearfix margin-bottom-20"></div>