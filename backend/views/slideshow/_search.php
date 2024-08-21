<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SlideshowSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slideshow-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'name_vi') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'des_vi') ?>

    <?php // echo $form->field($model, 'des_en') ?>

    <?php // echo $form->field($model, 'content_vi') ?>

    <?php // echo $form->field($model, 'content_en') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'homepage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
