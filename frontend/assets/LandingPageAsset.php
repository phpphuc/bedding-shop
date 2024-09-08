<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class LandingPageAsset extends AssetBundle
{
  // public $basePath = '@webroot';
  // public $baseUrl = '@web';
  public $css = [
    'css/landing-page.css', // Path to your specific CSS file
  ];
  public $js = [];
  public $depends = [];
}
