<?php

use yii\helpers\Html;
use backend\models\Postscat;
use backend\models\Posts;
use TonchikTm\Yii2Thumb\ImageThumb;
use kartik\datetime\DateTimePicker;
use backend\models\Videos;
use backend\models\Gallery;
use backend\models\Products;
use backend\models\Categorys;

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
    <div class="pagewrap"><?= $this->render('_category', ['categories' => $categories]) ?></div>

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

    <?php include 'danhmucsp/productsDMSP.php'; ?>
    <section class="hidden bg-white py-8">

        <?php foreach ($categories as $category):

            if (!$category) {
                $stt = 0;
                $defaultPageSize = 2;

                $modelID = $valueDM['id'];
                $nameDM = $valueDM['name_' . Yii::$app->language];
                $linkDM = Yii::$app->urlManager->createUrl('/san-pham/' . $valueDM['slug']);
                $imgDM = $valueDM['image'];
                $desDM = $valueDM['des_' . Yii::$app->language];
                $model = new Categorys();

                $modelCategory = $model->getCateChild($modelID);

                $query = Products::find()->where('status =1 and parent
                = 36');
                // IN (' . implode(',', $modelCategory) . ')');
                // = 36');
                // IN (' . implode(',', $modelCategory) . ')');
                // = 36');
                $countQuery = clone $query;
                $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $defaultPageSize]);
                $products = $query->offset($pages->offset)
                    ->limit($pages->limit)
                    ->orderBy('number asc, id desc')
                    ->all();
            } else {

                $query = Products::find()->where('status =1 and parent = ' . $modelID);
                $countQuery = clone $query;
                $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $defaultPageSize]);
                $products = $query->offset($pages->offset)
                    ->limit($pages->limit)
                    ->orderBy('number asc, id desc')
                    ->all();
            }

            if ($products) {
                $stt2 = 0;
                foreach ($products as $keyM => $valueP) {
                    $stt2++;
                    $linkP = Yii::$app->urlManager->createUrl('/chi-tiet-san-pham/' . $valueP['slug']);
                    $nameP = $valueP['name_' . Yii::$app->language];
                    $img = $valueP['image'];
                    $price = $valueP['price'];
                    $price_promotion = $valueP['price_promotion'];
        ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-left-10 padding-right-15 text-center">
                        <div class="text-center">
                            <div class="_boxpr">
                                <figure class="_imgsp ">
                                    <img src="<?= $img; ?>" alt="<?= $nameP; ?>" />
                                </figure>
                                <div>
                                    <div class="_namepr text-center"><a href="<?= $linkP; ?>" title="<?= $nameP; ?>"><?= $nameP; ?></a></div>
                                    <div style="padding: 5px 5px 15px;">
                                        <?php
                                        if ($price) {
                                        ?>
                                            <div class="_price"><?= Yii::t('app', 'Price') ?>: <span><?= number_format($price); ?>₫</span></div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="_price"><?= Yii::t('app', 'Price') ?>: <a href="<?= Yii::$app->urlManager->createUrl('/lien-he'); ?>" title="Liên hệ"><?= Yii::t('app', 'Contacts') ?></a></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($stt2 % 4 == 0) {
                    ?>
                        <div class="clearfix margin-bottom-10"></div>
            <?php
                    }
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
        <?php endforeach ?>

    </section>


    <!-- Banner -->
    <section class="py-16">
        <div class="wrapper mx-auto">
            <div class="relative">
                <div class="">
                    <img src="../images/bottom-banner.jpg" alt="Gấu Bông CAO CẤP" class="h-auto w-full" />
                </div>
                <div class="absolute bottom-1/3 right-32 text-center">
                    <a href="#">
                        <p class="text-shadow font-uvn-moi-hong text-3xl font-semibold text-white">Click vào để gửi liên hệ mua sỉ</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Images and News Section -->
    <!-- <div class="_bgtt"> -->
    <!-- Mất ngủ vì bgtt làm lồi ra thanh scroll x -->
    <!-- ._bgtt {
    /* min-width: 1230px; */
    padding: 35px 0 30px;
    background-color: #f3f3f3;
    } -->
    <?= $this->render('_img_and_news', ['tintucs' => $tintucs]); ?>
    <!-- </div> -->

</div>





<?php return; ?>

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