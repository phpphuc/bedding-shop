<?php

use yii\helpers\Html;
use backend\models\Postscat;
use backend\models\Posts;
use TonchikTm\Yii2Thumb\ImageThumb;
use kartik\datetime\DateTimePicker;
use backend\models\Videos;
use backend\models\Gallery;

/* @var $this yii\web\View */

$this->title = Yii::$app->MyComponent->website['title'];
// echo Posts::tableName();
// echo \backend\models\PageSearch::tableName();
// echo \backend\models\ResetPasswordForm::className();
// echo \backend\models\AuthAssignment::tableName();

//include 'slider.php';
include 'swiper.php';
?>

<div class="site-index">
    <!-- Introduction -->
    <?php
    if ($pageOne) {
        $linkAb = Yii::$app->urlManager->createUrl('/bai-viet/' . $pageOne['slug']);
        $nameAb = $pageOne['name_' . Yii::$app->language];
        $desAb = $pageOne['des_' . Yii::$app->language];
        $imgAb = $pageOne['image'];
    ?>
        <section class="intro-background bg-light py-8">
            <div class="container mx-auto">
                <div class="items-center justify-between md:flex">
                    <div class="md:w-1/2">
                        <!-- <img src="images/about-slide.png" alt="Introduction Image" class="w-full rounded-lg" /> -->
                        <?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgAb), 560, 432, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameAb, 'class' => 'lazy']]]); ?>
                    </div>
                    <div class="px-4 md:ml-8 md:w-1/2">
                        <div class="text-center">
                            <h2 class="font-utm-avo text-3xl font-bold text-pink-500"><?= $nameAb ?></h2>
                            <div class="decoration my-2">
                                <img src="../images/intro-decoration.png" alt="Decoration" class="mx-auto" />
                            </div>
                        </div>
                        <div style="font-family: 'Roboto', sans-serif;" class="text-justify !font-roboto text-lg leading-relaxed text-gray-700"><?= $desAb ?></div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>

    <!-- Images and News Section -->
    <div class="_bgtt">
        <?= $this->render('_img_and_news', ['tintucs' => $tintucs]); ?>
    </div>

</div>