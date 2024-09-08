<?php

use yii\helpers\Html;
use TonchikTm\Yii2Thumb\ImageThumb;
?>
<header class="bg-primary <?php echo Yii::$app->controller->id === 'site' && Yii::$app->controller->action->id === 'index' ? 'absolute' : 'relative'; ?> inset-x-0 z-10 text-white opacity-90">
    <!-- bg-primary  -->
    <div class="page-wrap">
        <div class="wrapper flex justify-between px-4">
            <div class="flex w-full items-center justify-between gap-8 lg:gap-20">
                <div class="flex items-center pt-0.5">
                    <a href="<?= Yii::$app->homeUrl; ?>">
                        <img src="<?= Yii::$app->MyComponent->website['logo']; ?>" alt="Logo" class="h-16 w-auto md:h-full" /></a>
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
                    <!-- <ul class="sky-mega-menu sky-mega-menu-anim-slide">
                        <?php //Yii::$app->MyComponent->menuGenerator('main', 0);
                        ?>
                    </ul> -->
                    <!-- <div class="menuMain"> -->
                    <!-- in desktop/style.css we have -->
                    <!-- .menuMain {
                        /* margin-top: 35px; */
                    } -->
                    <ul class="sky-mega-menu sky-mega-menu-anim-slide mt-2 flex flex-wrap space-x-2 font-utm-avo uppercase lg:justify-between">
                        <!-- <nav class="relative group mt-2 flex flex-wrap space-x-2 font-utm-avo uppercase lg:justify-between"> -->
                        <?php Yii::$app->MyComponent->menuGenerator('main', 0); ?>
                    </ul>
                    <!-- </nav> -->
                    <!-- </div> -->
                    <!-- <nav class="mt-2 flex flex-wrap space-x-2 font-utm-avo uppercase lg:justify-between">
                        <?php //Yii::$app->MyComponent->menuGenrator('main', 0);
                        ?>
                        <a href="#" class="nav__item">Trang chủ</a>
                        <a href="#" class="nav__item">Giới thiệu</a>
                        <a href="#" class="nav__item">Sản phẩm</a>
                        <a href="#" class="nav__item">Quà tặng khuyến mãi</a>
                        <a href="#" class="nav__item">Dịch vụ</a>
                        <a href="#" class="nav__item">Tin tức</a>
                        <a href="#" class="nav__item">Liên hệ</a>
                    </nav> -->
                </div>
                <div class="block md:hidden">
                    <button id="menu-toggle" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>