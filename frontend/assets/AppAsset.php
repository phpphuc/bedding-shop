<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/bootstrap-theme.min.css',
        'css/fontawesome/css/all.min.css',
        'css\fontawesome-free-6.6.0-web\css\all.min.css',
        'css/ionicons/css/ionicons.min.css',
        'css/fonts.css',

        'plugins/wowslider/styles/style.css',
        'css/animate.css',
        'plugins/OwlCarousel2/assets/owl.carousel.min.css',
        'plugins/OwlCarousel2/assets/owl.theme.default.min.css',
        'plugins/magiczoomplus/magiczoomplus.css',
        'plugins/fancybox/fancybox.min.css',
        'plugins/aos-animate/dist/aos.css',
        'plugins/jquery-simplyscroll/jquery.simplyscroll.css',
        'plugins/wow_book/wow_book.css',
        'css/sky-mega-menu.css',
        'css/sky-mega-menu-dm.css',
        'css/sky-mega-menu-left.css',
        'desktop/style.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/wow.min.js',
        'plugins/wowslider/wowslider.js',
        'plugins/wowslider/script.js',
        'plugins/OwlCarousel2/owl.carousel.min.js',
        'js/layout.js',
        'plugins/magiczoomplus/magiczoomplus.js',
        'plugins/fancybox/fancybox.min.js',
        'plugins/aos-animate/dist/aos.js',
        'plugins/jquery-simplyscroll/jquery.simplyscroll.min.js',
        'plugins/bootbox/bootbox.min.js',
        'js/ImageTooltip.js',
        'js/jquery.marquee.min.js',
        'plugins/wow_book/wow_book.min.js',
        'js/jquery.lazyload.js',
        'desktop/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
