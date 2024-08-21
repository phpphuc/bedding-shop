<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Videos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videos-form">

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
                    <?= $form->field($model, 'name_vi')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
                    <?=
                    $form->field($model, 'parent')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(backend\models\Videoscat::find()->all(), 'id', 'name_vi'),
                        'language' => 'vi',
                        'options' => ['placeholder' => 'Chọn danh mục...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?> 
                    <?= $form->field($model, 'video_id')->textInput(['class' => 'form-control']) ?>
                    <?= $form->field($model, 'image')->hiddenInput()->label(FALSE) ?>
                </div>
                <div class="col-md-4">
                    <?php
                    $img = $model->image ? $model->image : 'https://img.youtube.com/vi/0.jpg';
                    ?>
                    <img id='preshowImage' src="<?= $img; ?>" alt="@" class="img-responsive">
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

<?php
$this->registerJs(
        "$('#videos-video_id').bind('change keyup', function () {
        var id = $(this).val();
        var baseUrl = 'https://img.youtube.com/vi/' + id + '/0.jpg';
        $('#preshowImage').attr('src', baseUrl);
        $('#videos-image').attr('value', baseUrl);
    });"
);
?>
