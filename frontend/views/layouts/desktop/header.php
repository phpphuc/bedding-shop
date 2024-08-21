<?php

use yii\helpers\Html;
use TonchikTm\Yii2Thumb\ImageThumb;
?>
<div class="_banner">
    <div class="pagewrap-2">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-right-30">
                <div class="_logo"><a href="<?= Yii::$app->homeUrl; ?>" title="Logo">
                        <img src="<?= Yii::$app->MyComponent->website['logo']; ?>" alt="logo" class="lazy">
                    </a></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right padding-left-0">
                <div class="menuMain">
                    <ul class="sky-mega-menu sky-mega-menu-anim-slide">
                        <?php Yii::$app->MyComponent->menuGenerator('main', 0); ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right padding-left-0 padding-right-0">
                <div class="hotline_head"><a href="tel:<?= Yii::$app->MyComponent->config['link_phone']; ?>"><i class="fa fa-phone"></i> <?= Yii::$app->MyComponent->config['phone_header']; ?></a></div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right">
                <div class="ngonngu">
                    <div class="language_VN">
                        <?= Html::a(yii\helpers\Html::img('@web/desktop/images/icon_vn.png', ['alt' => '']), 'javascript:;', ['title' => 'Tiếng việt', 'class' => 'language', 'data-lg' => 'vi']); ?></a>
                        <?= Html::a('link text', '/wee') ?>
                    </div>
                    <div class="language_english">
                        <?= Html::a(yii\helpers\Html::img('@web/desktop/images/icon_en.png', ['alt' => '']), 'javascript:;', ['title' => 'Tiếng anh', 'class' => 'language', 'data-lg' => 'en']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="absolute inset-x-0 z-10 bg-primary text-white opacity-80">
    <div class="container flex justify-between px-4">
        <div class="flex w-full items-center justify-between gap-8 lg:gap-20">
            <div class="flex items-center pt-0.5">
                <img src="images/logo.png" alt="Logo" class="h-16 w-auto md:h-full" />
            </div>
            <div class="w-full md:block">
                <!-- hidden  -->
                <div class="mt-4 flex items-center justify-between">
                    <h1 class="font-utm-flamenco text-3xl uppercase">Chăn Drap Gối Nệm Hòa Bình</h1>
                    <p class="hidden font-hp-avo lg:block">
                        <i class="fa-solid fa-phone mr-2 rounded-full border-2 p-1.5 text-white"></i>Hotline:
                        <a href="tel:01295656879" class="font-bold text-[#ffff00]"> 0129 565 6879</a>
                        -
                        <a href="tel:0909700569" class="font-bold text-[#ffff00]"> 0909 700 569</a>
                    </p>
                </div>
                <nav class="mt-2 flex flex-wrap space-x-2 font-utm-avo uppercase lg:justify-between">
                    <a href="#" class="nav__item">Trang chủ</a>
                    <a href="#" class="nav__item">Giới thiệu</a>
                    <a href="#" class="nav__item">Sản phẩm</a>
                    <a href="#" class="nav__item">Quà tặng khuyến mãi</a>
                    <a href="#" class="nav__item">Dịch vụ</a>
                    <a href="#" class="nav__item">Tin tức</a>
                    <a href="#" class="nav__item">Liên hệ</a>
                </nav>
            </div>
            <div class="block md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>