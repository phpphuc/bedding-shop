<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HoatdongSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoatdong-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_vi') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'des_vi') ?>

    <?= $form->field($model, 'des_en') ?>

    <?php // echo $form->field($model, 'thumb') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
