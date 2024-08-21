<?php
/* @var $this yii\web\View */

use TonchikTm\Yii2Thumb\ImageThumb;

$this->title = Yii::t('app', 'Tag posts');
?>

<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <a class="mybreadcrumb__step" href="javascript:;">Tag (<?= count($models); ?> <?= Yii::t('app', 'result'); ?>)</a>
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
                $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $valueN['slug']);
                $nameN = $valueN['name_' . Yii::$app->language];
                $desN = $valueN['des_' . Yii::$app->language];
                if ($valueN['image']) {
                    $imgN = $valueN['image'];
                } else {
                    $imgN = '/frontend/web/desktop/images/no-img.jpg';
                }
                ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-left-0 padding-right-0 margin-bottom-30" data-aos="fade-down" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 padding-right-0">
                            <div><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgN), 190, 137, ['source' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameN, 'class' => 'lazy']]]); ?></a></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="_namett-detail"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><h2><?= $nameN; ?></h2></a></div>
                            <div class="text-justify"><?= Yii::$app->MyComponent->myTruncate($desN, 180, " ", "..."); ?></div>
                        </div>
                    </div>
                </div>
                <?php
                if ($stt % 2 == 0) {
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