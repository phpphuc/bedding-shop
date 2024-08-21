<?php
/* @var $this yii\web\View */
$this->title = $model['title'];
?>

<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <a class="mybreadcrumb__step" href="javascript:;"><?= $model['name_' . Yii::$app->language]; ?></a>
            </div>
            <div class="clearfix margin-bottom-20"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div><?= $model['content_' . Yii::$app->language]; ?></div>
            <div class="clearfix margin-bottom-10"></div>
      
<!--            <div class="fb-comments" data-href="<?//= \yii\helpers\Url::to('bai-viet/' . $model['slug'] . '.html', true); ?>" data-width="" data-numposts="5"></div>-->
        </div>
    </div>
</div>