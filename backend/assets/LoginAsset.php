<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'css/bootstrap.min.css',
        'css/fontawesome/css/all.min.css',
        'css/AdminLTE.min.css',
        'plugins/iCheck/square/blue.css',
    ];
    public $js = [
        'plugins/iCheck/icheck.min.js',
    ];
    // public $depends = [
    //     'yii\web\YiiAsset',
    //     'yii\bootstrap\BootstrapAsset',
    // ];

}
