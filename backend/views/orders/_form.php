<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'product_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_price')->textInput() ?>

    <?= $form->field($model, 'product_quantity')->textInput() ?>

    <?= $form->field($model, 'product_cost')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
