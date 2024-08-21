<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'name_vi') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'address_vi') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'fanpage') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'map') ?>

    <?php // echo $form->field($model, 'address_en') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'favicon') ?>

    <?php // echo $form->field($model, 'banner') ?>

    <?php // echo $form->field($model, 'lang') ?>

    <?php // echo $form->field($model, 'headtag') ?>

    <?php // echo $form->field($model, 'bodytag') ?>

    <?php // echo $form->field($model, 'heading') ?>

    <?php // echo $form->field($model, 'customcss') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
