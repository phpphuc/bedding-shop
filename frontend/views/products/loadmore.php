<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use Imagine\Image\ManipulatorInterface;
?>
<div class="row">
    <?php
    $stt = 0;
    foreach ($models as $keyM => $valueP) {
        $stt++;
        $nameP = $valueP['name_' . Yii::$app->language];
        $linkP = Yii::$app->urlManager->createUrl(['/chi-tiet-san-pham/' . $valueP['slug']]);
        $imgP = $valueP['image'];
        $price = $valueP['price'];
        $price_promotion = $valueP['price_promotion'];
        ?>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 margin-bottom-20">
            <div class="_boxpr">
                <div class="_imgsp text-center hover14">
                    <a href="<?= $linkP; ?>" title="<?= $nameP; ?>"><figure><?= Html::img(Yii::$app->thumbnailer->get($imgP, 278, 280, 80, ManipulatorInterface::THUMBNAIL_INSET), ['alt' => $nameP, 'class' => 'lazy']); ?></figure></a>
                </div>
                <div class="_box-price">
                    <div class="_namepr"><a href="<?= $linkP; ?>" title="<?= $nameP; ?>"><?= $nameP; ?></a></div>
                    <?php
                    if ($price_promotion) {
                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-left-0 padding-right-5">
                                <div class="_pricekm"><span><?= number_format($price_promotion); ?>₫</span></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-left-5 padding-right-0">
                                <div class="_pricegoc"><?= number_format($price); ?>₫</div>
                            </div>
                        </div>
                        <?php
                    } elseif ($price) {
                        ?>
                        <div class="_pricekm"><?= Yii::t('app', 'Price'); ?>: <span><?= number_format($price); ?>₫</span></div>
                        <?php
                    } else {
                        ?>
                        <div class="_pricekm"><?= Yii::t('app', 'Price'); ?>: <a href="<?= Yii::$app->urlManager->createUrl('/lien-he'); ?>" title="<?= Yii::t('app', 'Contact'); ?>"><?= Yii::t('app', 'Contact'); ?></a></div>
                        <?php
                    }
                    ?>
                </div>
            </div> 
        </div>
        <?php
        if ($stt % 4 == 0) {
            ?>
            <div class="clearfix"></div>
            <?php
        }
    }
    ?>
</div>