<?php
/* @var $this yii\web\View */

use TonchikTm\Yii2Thumb\ImageThumb;

$this->title = Yii::t('app', 'List of products');
?>
<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <a class="mybreadcrumb__step" href="javascript:;"><?= Yii::t('app', 'Products'); ?></a>
            </div>
            <div class="clearfix margin-bottom-20"></div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($categories) {
            $stt = 0;
            $defaultPageSize = 8;
            $stt = 0;
            foreach ($models as $keyM => $valueP) {
                $stt++;
                $linkP = Yii::$app->urlManager->createUrl('/chi-tiet-san-pham/' . $valueP['slug']);
                $nameP = $valueP['name_' . Yii::$app->language];
                $desP = $valueP['des_' . Yii::$app->language];
                $imgP = $valueP['image'];
        ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 margin-bottom-30 text-center" data-aos="fade-up" data-aos-duration="1500">
                    <div class="_boxpr2">
                        <div class="hover15 text-center"><a href="<?= $linkP; ?>" title="<?= $nameP; ?>">
                                <figure><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgP), 320, 235, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_INSET], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $nameP, 'class' => 'lazy']]]); ?></figure>
                            </a></div>
                        <div class="_namepr"><a href="<?= $linkP; ?>" title="<?= $nameP; ?>"><?= $nameP; ?></a></div>
                        <div class="_despr"><?= Yii::$app->MyComponent->myTruncate($desP, 160, " ", " [...]"); ?></div>
                    </div>
                </div>
                <?php
                if ($stt % 3 == 0) {
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