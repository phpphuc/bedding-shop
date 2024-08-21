<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Configs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configs-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?=
            $form->field($model, 'type')->widget(Select2::classname(), [
                'data' => ['text' => 'Text', 'area' => 'TextArea', 'img' => 'Image', 'editor' => 'Editor', 'file' => 'File'],
                'language' => 'vi',
            ]);
            ?>
            <?=
            $form->field($model, 'language')->widget(Select2::classname(), [
                'data' => ['all' => 'Tất cả', 'vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh'],
                'language' => 'vi',
            ]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
