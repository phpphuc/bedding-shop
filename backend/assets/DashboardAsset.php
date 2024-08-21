<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fontawesome/css/all.min.css',
        'css/AdminLTE.min.css',
        'css/_all-skins.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'css/site.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery-ui.min.js',
        'js/bootstrap.min.js',
        'js/Chart.js',
        'js/adminlte.min.js',
        'js/demo.js',
        'ckeditor/ckeditor.js',
        'ckfinder/ckfinder.js',
        'ckfinder/functions.js',
        'js/main.js',
    ];
    // public $depends = [
    //     'yii\web\YiiAsset',
    //     'yii\bootstrap\BootstrapAsset',
    // ];

}
