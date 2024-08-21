<?php
/* @var $this yii\web\View */

use TonchikTm\Yii2Thumb\ImageThumb;

$this->title = 'Thư Viện';
?>

<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <a class="mybreadcrumb__step" href="javascript:;"><?= Yii::t('app', 'Library') ?></a>
            </div>
            <div class="clearfix margin-bottom-30"></div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($models) {
            $stt = 0;
            foreach ($models as $keyN => $valueN) {
                $stt++;
                $linkN = Yii::$app->urlManager->createUrl('/thu-vien/' . $valueN['slug']);
                $nameN = $valueN['name_' . Yii::$app->language];
                $imgN = $valueN['image'];
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 margin-bottom-30" data-aos="fade-down" data-aos-duration="1000">
                    <div><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgN), 278, 200, ['source' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameN, 'class' => 'lazy']]]); ?></a></div>
                    <div class="_namett-detail text-center" style="margin-top: 10px;"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><h2><?= $nameN; ?></h2></a></div>
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