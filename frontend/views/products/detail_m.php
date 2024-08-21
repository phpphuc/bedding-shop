<?php
/* @var $this yii\web\View */

use TonchikTm\Yii2Thumb\ImageThumb;
use backend\models\Categorys;

$this->title = $models['title'];
?>

<div class="pagewrap">
    <div class="_box-content">
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
                    <a class="mybreadcrumb__step" href="<?= Yii::$app->urlManager->createUrl('/san-pham/' . $model['slug']); ?>"><?= $model['name_' . Yii::$app->language] ?></a>
                    <a class="mybreadcrumb__step" href="javascript:;"><span><?= $models['name_' . Yii::$app->language] ?></span></a>
                </div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="_boxviews">
                    <div class="product_info_vote">
                        <div>
                            <?php
                            echo kartik\rating\StarRating::widget([
                                'id' => 'myrating',
                                'name' => 'rating',
                                'value' => $models['rating'],
                                'pluginOptions' => [
                                    'min' => 0,
                                    'max' => 10,
                                    'step' => 1,
                                    'size' => 'xs',
                                    'showClear' => 'false',
                                    'showCaption' => 'false',
                                    'showCaptionAsTitle' => 'false',
                                    'clearCaption' => $models['userrate'] . ' ' . Yii::t('app', 'Evaluate'),
                                    'starCaptions' => [
                                        1 => '0,5 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        2 => '1 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        3 => '1,5 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        4 => '2 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        5 => '2,5 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        6 => '3 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        7 => '3,5 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        8 => '4 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        9 => '4,5 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                        10 => '5 ' . Yii::t('app', 'Star') . ' (' . $models['userrate'] . ' ' . Yii::t('app', 'Evaluate') . ')',
                                    ],
                                    'starCaptionClasses' => [
                                        1 => 'text-danger',
                                        2 => 'text-danger',
                                        3 => 'text-warning',
                                        4 => 'text-warning',
                                        5 => 'text-info',
                                        6 => 'text-info',
                                        7 => 'text-primary',
                                        8 => 'text-primary',
                                        9 => 'text-success',
                                        10 => 'text-success',
                                    ],
                                ],
                                'pluginEvents' => [
                                    'rating:change' => 'function(event, value, caption) {
                            $.ajax({
                                url: "/rating.html",
                                type: "POST",
                                data: {
                                    id: ' . $models['id'] . ',
                                    value: value,
                                }
                            }).done(function (data) {
                                location.reload();
                            });
                        }',
                                ],
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="_views"><i class="fas fa-eye"></i> <?= $models['views']; ?></div>
                </div>
                <div class="clearfix margin-bottom-10"></div>
                <a href="<?= $models['image']; ?>" class="MagicZoom" id="jeans"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $models['image']), 640, 470, ['source' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $models['name_' . Yii::$app->language], 'class' => 'lazy']]]); ?></a>
                <div style="padding-top: 5px;" class="_slick6 text-center">
                    <?php
                    if ($models['thumb']) {
                        ?>
                        <a data-zoom-id="jeans" href="<?= $models['image']; ?>" data-image="<?= $models['image']; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $models['image']), 50, 50, ['source' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $models['name_' . Yii::$app->language], 'class' => 'lazy']]]); ?></a>
                        <?php
                        $arrImg = explode(',', rtrim($models['thumb'], ","));
                        foreach ($arrImg as $items_img) {
                            ?>
                            <a data-zoom-id="jeans" href="<?= $items_img; ?>" data-image="<?= $items_img; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $items_img), 50, 50, ['source' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $models['name_' . Yii::$app->language], 'class' => 'lazy']]]); ?></a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="clearfix margin-bottom-20"></div>
            <div class="col-xs-12">
                <div class="product_info_name"><?= $models['name_' . Yii::$app->language]; ?></div>
                <hr style="margin: 10px 0;">
                <div>
                    <?php
                    $price_promotion = $models['price_promotion'];
                    $price = $models['price'];
                    $rehon = str_replace(',', '', $price) - str_replace(',', '', $price_promotion);
                    if ($rehon) {
                        $phantram = ($rehon * 100) / str_replace(',', '', $price);
                    } else {
                        $phantram = 0;
                    }
                    if ($price_promotion) {
                        ?>
                        <div class="_price-km-detail"><?= number_format($price_promotion); ?> ₫</div>
                        <div class="_tietkiem"><?= Yii::t('app', 'Saving'); ?>: <span><?= round($phantram, 0, PHP_ROUND_HALF_UP); ?>%</span> (<?= number_format($rehon); ?> ₫)</div>
                        <div class="_price-goc-detail"><?= Yii::t('app', 'Market price'); ?>: <?= number_format($price); ?> ₫</div>
                    <?php } elseif ($price) {
                        ?>
                        <div class="_price-km-detail"><?= number_format($price); ?> ₫</div>
                        <?php
                    } else {
                        ?>
                        <div class="_price-km-detail"><?= Yii::t('app', 'Contact'); ?></div>
                    <?php } ?>
                </div>
                <div class="clearfix margin-bottom-15"></div>
                <?php
                if ($options) {
                    ?>
                    <div class="_option-pr">
                        <table class="table table-striped table-condensed table-hover">
                            <?php
                            foreach ($options as $key => $value) {
                                $name = $value['name_' . Yii::$app->language];
                                $value = $value['value_' . Yii::$app->language];
                                ?>
                                <tr>
                                    <td style="width: 100px;"><?= $name ?>:</td>
                                    <td><?= $value ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <?php
                }
                if (!empty($models['des_' . Yii::$app->language])) {
                    ?>
                    <div class="_box-des-prditail"><?= $models['des_' . Yii::$app->language] ?></div>
                    <?php
                }
                ?>
                <hr>
                <div>
                    <?=
                    \ymaker\social\share\widgets\SocialShare::widget([
                        'configurator' => 'socialShare',
                        'url' => \yii\helpers\Url::to('chi-tiet-san-pham/' . $models['slug'] . '.html', true),
                        'title' => $this->title,
                        'description' => $models['description'],
                        'imageUrl' => \yii\helpers\Url::to($models['image'], true),
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <div class="clearfix margin-bottom-20"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="_mytab-detail">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#content" role="tab" data-toggle="tab"><?= Yii::t('app', 'Details') ?></a></li>
                        <li><a href="#comment" role="tab" data-toggle="tab"><?= Yii::t('app', 'Comment') ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="content"><?= $models['content_' . Yii::$app->language]; ?></div>
                        <div class="tab-pane fade" id="comment"><div class="fb-comments" data-href="<?= \yii\helpers\Url::to('chi-tiet-san-pham/' . $models['slug'] . '.html', true); ?>" data-width="" data-numposts="5"></div></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($models['tag']) {
            $arrLink = explode(',', $models['tag_compare']);
            $arrName = explode(',', $models['tag']);
            $arrTag = array_combine($arrLink, $arrName);
            ?>
            <div class="clearfix margin-bottom-20"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="_tagpr"><i class="fas fa-tags"></i> 
                        <?php
                        foreach ($arrTag as $key => $value) {
                            ?>
                            <a href="<?= Yii::$app->urlManager->createUrl('tag/' . $key); ?>" title="<?= $value; ?>"><?= $value; ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix margin-bottom-20"></div>
                <div class="_title-prsame text-center">
                    <span>Sản Phẩm Cùng Loại</span>
                </div>
            </div>
        </div>
        <div class="clearfix margin-bottom-15"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center padding-left-10 padding-right-10">
                <div class="_autoplay text-center">
                    <?php
                    if ($productsSame) {
                        foreach ($productsSame as $keyP => $valueP) {
                            $nameP = $valueP['name_' . Yii::$app->language];
                            $linkP = Yii::$app->urlManager->createUrl(['/chi-tiet-san-pham/' . $valueP['slug']]);
                            $desP = $valueP['des_' . Yii::$app->language];
                            $imgP = $valueP['image'];
                            ?>
                            <div class="_boxpr2">
                                <div class="hover15 text-center"><a href="<?= $linkP; ?>" title="<?= $nameP; ?>"><figure><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgP), 448, 329, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_INSET], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $nameP, 'class' => 'lazy']]]); ?></figure></a></div>
                                <div class="_namepr"><a href="<?= $linkP; ?>" title="<?= $nameP; ?>"><?= $nameP; ?></a></div>
                                <div class="_despr"><?= Yii::$app->MyComponent->myTruncate($desP, 160, " ", " [...]"); ?></div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix margin-bottom-20"></div>