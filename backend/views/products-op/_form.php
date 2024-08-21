<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductsOp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-op-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->textInput() ?>

    <?= $form->field($model, 'name_vi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'value_vi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'value_en')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
