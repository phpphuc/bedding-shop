<?php
use TonchikTm\Yii2Thumb\ImageThumb;
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Tag posts');
?>

<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-md-12">
                <div class="mybreadcrumb">
                    <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                    <a class="mybreadcrumb__step" href="javascript:;"><span>Tag (<?= count($models); ?> <?= Yii::t('app', 'result'); ?>)</span></a>
                </div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
        <?php
        if ($models) {
            foreach ($models as $keyN => $valueN) {
                $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $valueN['slug']);
                $nameN = $valueN['name_' . Yii::$app->language];
                $desN = $valueN['des_' . Yii::$app->language];
                if ($valueN['image']) {
                    $imgN = $valueN['image'];
                } else {
                    $imgN = '/frontend/web/desktop/images/no-img.jpg';
                }
                ?>
                <div class="col-md-12 margin-bottom-30">
                    <div class="text-center"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgN), 380, 330, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameN, 'class' => 'lazy']]]); ?></a></div>
                    <div class="_namett-detail"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= $nameN; ?></a></div>
                    <div class="_destt-detail"><?= Yii::$app->MyComponent->myTruncate($desN, 180, " ", " [...]"); ?></div>
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