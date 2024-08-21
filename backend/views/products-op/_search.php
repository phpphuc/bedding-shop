<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductsOpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-op-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'name_vi') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'value_vi') ?>

    <?php // echo $form->field($model, 'value_en') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
