<?php
/* @var $this yii\web\View */
$this->title = $model['title'];
?>

<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-md-12">
                <div class="mybreadcrumb">
                    <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                    <a class="mybreadcrumb__step" href="javascript:;"><span><?= $model['name_' . Yii::$app->language]; ?></span></a>
                </div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div><?= $model['content_' . Yii::$app->language]; ?></div>
                <div class="clearfix margin-bottom-10"></div>
         
                
            </div>
        </div>
    </div>
</div>
<div class="clearfix margin-bottom-20"></div>