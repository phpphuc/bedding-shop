<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\backend\models\Hoatdong::cat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoatdong-form">
    <div class="text-danger" style="margin-bottom: 10px;"><em><i class="fas fa-exclamation-triangle"></i> Lưu ý: Tên hình ảnh <strong style="color: red;">viết liền không dấu</strong> hoặc <strong style="color: red;">ngăn cách bằng dấu "-"</strong> (VD: <strong style="color: red;">hinhanh01.jpg</strong> hoặc <strong style="color: red;">hinh-anh-01.jpg</strong>)</em></div>
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
                <div class="col-md-12">
                    <div class="profile-userbuttons">
                        <span onclick="BrowseServerThumb('Images:/', 'hoatdong-thumb')" class="btn btn-success fileinput-button" style="margin-bottom: 20px;">
                            <i class="fa fa-plus"></i>
                            <span id="files">Select image...</span>
                        </span>
                    </div>

                    <?php echo $form->field($model, 'thumb')->hiddenInput(); ?>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>
                                <div id="preview">
                                    <ul class="list-inline" id="thumbnails">
                                        <?php
                                        $arr = explode(',', $model->thumb);
                                        foreach ($arr as $items) {
                                            if ($items) {
                                                ?>
                                                <li id="<?php echo $items; ?>" class="thumb">
                                                    <div class="_boxthumb"><img src="<?php echo $items; ?>" alt="" /></div>
                                                    <div class="text-center removeimg"><a href="javascript:;" class="btn default btn-sm" onclick="removeValue('<?php echo $items; ?>', 'hoatdong-thumb');return false;"><i class="fa fa-times"></i> Remove </a></div>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="english">
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'des_en')->textarea(['rows' => 3]) ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
