<?php

use TonchikTm\Yii2Thumb\ImageThumb;
use backend\models\Categorys;

/* @var $this yii\web\View */
$this->title = $model['title'];
?>
<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <?php
                $cateParent = (new Categorys())->getAllLastParent($model['id']);
                if ($cateParent) {
                    foreach ($cateParent as $item) {
                        $cate = Categorys::findOne(['id' => $item]);
                        ?>
                        <a class="mybreadcrumb__step" href="<?= Yii::$app->urlManager->createUrl('/san-pham/' . $cate['slug']); ?>"><?= $cate['name_' . Yii::$app->language] ?></a>
                        <?php
                    }
                }
                ?>
                <a class="mybreadcrumb__step" href="javascript:;"><?= $model['name_' . Yii::$app->language] ?></a>
            </div>
            <div class="clearfix margin-bottom-20"></div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($models) {
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
                        <div class="hover15 text-center"><a href="<?= $linkP; ?>" title="<?= $nameP; ?>"><figure><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgP), 320, 235, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_INSET], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $nameP, 'class' => 'lazy']]]); ?></figure></a></div>
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