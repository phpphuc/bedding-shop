<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use jlorente\remainingcharacters\RemainingCharacters;

/* @var $this yii\web\View */
/* @var $model backend\models\Videoscat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videoscat-form">

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
                    <?=
                    $form->field($model, 'parent')->widget(Select2::classname(), [
                        'data' => ArrayHelper::merge(["0" => "Là danh mục chính"], ArrayHelper::map($arrList, 'id', 'name_vi')),
                        'language' => 'vi',
                        //'options' => ['placeholder' => 'Chọn danh mục...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]);
                    ?>
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
                            'rows' => '3',
                            //'class' => 'col-md-12',
                            'maxlength' => 300,
                            'placeholder' => 'Viết mô tả...'
                        ]
                    ]);
                    ?>

                    <?= $form->field($model, 'keyword')->textarea(['rows' => 3]) ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="english">
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
