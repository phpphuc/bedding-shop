<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use jlorente\remainingcharacters\RemainingCharacters;

/* @var $this yii\web\View */
/* @var $model backend\models\Categorys */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorys-form">

    <?php $form = ActiveForm::begin(); ?>

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
                <div class="col-md-8">
                    <?= $form->field($model, 'name_vi')->textInput(['maxlength' => true, 'class' => 'form-control sAlias']) ?>
                    <?= $form->field($model, 'slug')->textInput(['class' => 'form-control tAlias']) ?>
                    <?= $form->field($model, 'des_vi')->textarea(['rows' => 6, 'class' => 'ckeditor']) ?>
                    <?= $form->field($model, 'content_vi')->textarea(['rows' => 6, 'class' => 'ckeditor']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'title')->textInput() ?>

                    <?=
                    $form->field($model, 'description')->widget(RemainingCharacters::classname(), [
                        'type' => RemainingCharacters::INPUT_TEXTAREA,
                        'text' => 'Còn lại {n} ký tự',
                        'label' => [
                            'tag' => 'p',
                            'id' => 'my-counter',
                            'class' => 'counter',
                            'invalidClass' => 'error'
                        ],
                        'options' => [
                            'rows' => '6',
                            //'class' => 'col-md-12',
                            'maxlength' => 300,
                            'placeholder' => 'Viết mô tả...'
                        ]
                    ]);
                    ?>

                    <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= $form->field($model, 'image')->hiddenInput()->label(); ?>               
                        <?php
                        $img = $model->image ? trim($model->image) : Yii::$app->homeUrl . '/images/400x200.jpg';
                        ?>
                        <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình" onclick="BrowseServer('Images:/', 'page-image');" />
                        <?php if ($model->image) { ?>
                            <button type="button" class="btn btn-danger btn-sm profile-edit delete">Delete</button>
                        <?php } else {
                            ?>
                            <button type="button" class="btn btn-danger btn-sm profile-edit delete" style="display: none;">Delete</button>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="english">
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'des_en')->textarea(['rows' => 6, 'class' => 'ckeditor']) ?>
            <?= $form->field($model, 'content_en')->textarea(['rows' => 6, 'class' => 'ckeditor']) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs(
    "$(document).ready(function () {
        $('#page-image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
        });
        $('.delete').click(function () {
            $('.img-select').attr('src', '/webadmin/images/400x200.jpg');
            $('#page-image').val('');
            $('.delete').hide();
        });
    });"
);
?>
