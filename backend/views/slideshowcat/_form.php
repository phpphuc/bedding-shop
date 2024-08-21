<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Slideshowcat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slideshowcat-form">

    <?php $form = ActiveForm::begin();?>

     <!-- Nav tabs -->
    <ul class="nav nav-tabs margin-bottom-20" role="tablist">
        <li class="active"><a href="#vietnamese" role="tab" data-toggle="tab">Tiếng Việt</a></li>
        <?php
        if (Yii::$app->MyComponent->lang_num == 2) {
            ?>
            <li><a href="#english" role="tab" data-toggle="tab">Tiếng Anh</a></li>
            <?php
        }
        ?>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="vietnamese">
            <div class="row">
                <div class="col-md-12">
                    <?=$form->field($model, 'name_vi')->textInput(['maxlength' => true, 'class' => 'form-control sAlias'])?>
                    <?=$form->field($model, 'slug')->hiddenInput(['class' => 'form-control tAlias'])->label(false)?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="english">
            <?=$form->field($model, 'name_en')->textInput(['maxlength' => true])?>
        </div>
    </div>
    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
