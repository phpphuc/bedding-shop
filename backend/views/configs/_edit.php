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

    <?php
    switch ($model->type) {
        case 'text':
            echo $form->field($model, 'value')->textInput();
            break;
        case 'img':
            ?>
            <div class="form-group">
                <?= $form->field($model, 'value')->hiddenInput()->label(); ?>               
                <?php
                $img = $model->value ? trim($model->value) : Yii::$app->homeUrl . '/images/400x200.jpg';
                ?>
                <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình" onclick="BrowseServer('Images:/', 'configs-value');" />
                <?php if ($model->value) { ?>
                    <button type="button" class="btn btn-danger btn-sm profile-edit delete">Delete</button>
                <?php } else {
                    ?>
                    <button type="button" class="btn btn-danger btn-sm profile-edit delete" style="display: none;">Delete</button>
                    <?php
                }
                ?>

            </div>
            <?php
            $this->registerJs(
                    "$(document).ready(function () {
                    $('#configs-value').bind('change', function () {
                        $('.img-select').attr('src', $(this).val());
                    });
                    $('.delete').click(function () {
                        $('.img-select').attr('src', '/webadmin/images/400x200.jpg');
                        $('#configs-value').val('');
                        $('.delete').hide();
                    });
                });"
            );
            break;
        case 'area':
            echo $form->field($model, 'value')->textarea(['row' => 6]);
            break;
        case 'editor':
            echo $form->field($model, 'value')->textarea(['class' => 'ckeditor']);
            break;
        case 'file':
            ?>
            <div class="form-group">
                <?= $form->field($model, 'value')->hiddenInput()->label(); ?>
                <label class="control-label" for="configs-value">Chọn File <span class="text-danger">(File type: *.mp4 - File size <= 2M)</span></label>
                <div class="input-group">
                    <input readonly="true" type="text" value="<?= $model->value; ?>" name="output-link" id="output-link" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="button" onclick="selectFileWithCKFinder('Files:/', 'configs-value');">Chọn File</button>
                    </span>
                </div>
                <?php if ($model->value) { ?>
                    <button type="button" class="btn btn-danger btn-sm profile-edit delete">Delete</button>
                <?php } else {
                    ?>
                    <button type="button" class="btn btn-danger btn-sm profile-edit delete" style="display: none;">Delete</button>
                    <?php
                }
                ?>
            </div>
            <?php
            $this->registerJs(
                    "$(document).ready(function () {
                    $('#configs-value').bind('change', function () {
                        $('#output-link').val($(this).val());
                    });
                    $('.delete').click(function () {
                        $('#output-link').val('');
                        $('#configs-value').val('');
                        $('.delete').hide();
                    });;
                });"
            );
            break;
        default:
            break;
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
