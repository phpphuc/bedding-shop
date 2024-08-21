<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\backend\models\Thuvien::cat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thuvien-form">
    <div class="text-danger" style="margin-bottom: 10px;"><em><i class="fas fa-exclamation-triangle"></i> Lưu ý: Tất cả hình ảnh <strong style="color: red;">cùng kích thước</strong> và tên hình ảnh <strong style="color: red;">viết liền không dấu</strong> hoặc <strong style="color: red;">ngăn cách bằng dấu "-"</strong> (VD: <strong style="color: red;">hinhanh01.jpg</strong> hoặc <strong style="color: red;">hinh-anh-01.jpg</strong>)</em></div>
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

                    <div class="profile-userbuttons">
                        <span onclick="BrowseServerThumb('Images:/', 'thuvien-thumb')" class="btn btn-success fileinput-button" style="margin-bottom: 20px;">
                            <i class="fa fa-plus"></i>
                            <span id="files">Select files...</span>
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
                                                    <div class="text-center removeimg"><a href="javascript:;" class="btn default btn-sm" onclick="removeValue('<?php echo $items; ?>', 'thuvien-thumb');return false;"><i class="fa fa-times"></i> Remove </a></div>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <?= $form->field($model, 'image')->hiddenInput()->label(); ?>
                        <?php
                        $img = $model->image ? trim($model->image) : Yii::$app->homeUrl . '/images/400x200.jpg';
                        ?>
                        <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình" onclick="BrowseServer('Images:/', 'thuvien-image');" />
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
        $('#thuvien-image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
        });
        $('.delete').click(function () {
            $('.img-select').attr('src', '/webadmin/images/400x200.jpg');
            $('#thuvien-image').val('');
            $('.delete').hide();
        });
    });"
);
?>
