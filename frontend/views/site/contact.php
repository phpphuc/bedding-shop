<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::t('app', 'Contact');
?>
<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <a class="mybreadcrumb__step" href="javascript:;"><?= Yii::t('app', 'Contact'); ?></a>
            </div>
            <div class="clearfix margin-bottom-30"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
            <div class="_box-add-contact">
                <div><h3><strong><?= Yii::$app->MyComponent->website['name_' . Yii::$app->language]; ?></strong></h3></div>
                <div><?= Yii::$app->MyComponent->website['address_' . Yii::$app->language]; ?></div>
            </div>
            <div class="clearfix margin-bottom-20"></div>
            <div id="googleMap"></div>
            <div class="clearfix margin-bottom-15"></div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput() ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'phone') ?>

            <?= $form->field($model, 'subject') ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <?=
            $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'captchaAction' => Url::to('/site/captcha'),
                'template' => '<div class="text-center">{image}</div><br/> {input} ',
                'imageOptions' => [
                    'class' => 'img-fluid',
                    'style' => 'cursor:pointer; width: 100%',
                    'title' => Yii::t('app', 'Click to refresh the code'),
                ],
                'options' => [
                    'placeholder' => Yii::t('app', 'Verification code'),
                    'class' => 'form-control',
                ],
            ])->label(false)
            ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script>
    map = L.map('googleMap').setView([<?= Yii::$app->MyComponent->website['map']; ?>], 13);
    // set map tiles source
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);
    // add marker to the map
    marker = L.marker([<?= Yii::$app->MyComponent->website['map']; ?>]).addTo(map);
    // add popup to the marker
    marker.bindPopup('<?= Yii::$app->MyComponent->config['add-map']; ?>').openPopup();
</script>
