<?php

use yii\helpers\Html;
use backend\models\Postscat;
use backend\models\Posts;
use TonchikTm\Yii2Thumb\ImageThumb;
use kartik\datetime\DateTimePicker;
use backend\models\Videos;
use backend\models\Gallery;
use backend\models\Products;

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
    <!-- Categories -->
    <?= $this->render('../category/index', ['categories' => $categories]) ?>

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
    <!-- Products Section -->

    <section class="bg-white py-8">

        <?php foreach ($categories as $category):
            $products = Products::find()->where(['parent' => $category->id])->all();
        ?>
            <div class="container mx-auto">
                <h2 class="text-center font-utm-avo text-3xl font-bold text-pink-500"><?= $category->{'name_' . Yii::$app->language} ?></h2>
                <div class="decoration my-2">
                    <img src="../images/products-decoration.png" alt="Decoration" class="mx-auto" />
                </div>
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
                    <?php foreach ($products as $product): ?>

                        <div class="overflow-hidden rounded-lg border border-[#ededed] bg-white">
                            <img src="<?= $product->image ?>" alt="Product Image" class="h-48 w-full border-b border-[#ededed] object-cover p-2" />
                            <div class="p-4 text-center">
                                <h3 class="mb-2 font-roboto text-xl font-bold text-gray-900"><?= $product->{'name_' . Yii::$app->language} ?></h3>
                                <p class="font-roboto">
                                    Giá:
                                    <span class="font-roboto font-bold text-red-600"><?= $product->price ? number_format($product->price) : 'LIÊN HỆ' ?></span>
                                </p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endforeach ?>

    </section>
    <!-- Images and News Section -->
    <div class="_bgtt">
        <?= $this->render('_img_and_news', ['tintucs' => $tintucs]); ?>
    </div>

</div>