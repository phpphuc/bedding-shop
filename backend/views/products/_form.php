<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use pudinglabs\tagsinput\TagsinputWidget;
use wbraganca\dynamicform\DynamicFormWidget;
use jlorente\remainingcharacters\RemainingCharacters;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-op").each(function(index) {
        jQuery(this).html("Option: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-op").each(function(index) {
        jQuery(this).html("Option: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="products-form">
    <div class="text-danger" style="margin-bottom: 10px;"><em><i class="fas fa-exclamation-triangle"></i> Lưu ý: Tất cả hình ảnh <strong style="color: red;">cùng kích thước</strong> và tên hình ảnh <strong style="color: red;">viết liền không dấu</strong> hoặc <strong style="color: red;">ngăn cách bằng dấu "-"</strong> (VD: <strong style="color: red;">hinhanh01.jpg</strong> hoặc <strong style="color: red;">hinh-anh-01.jpg</strong>)</em></div>
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

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
        <li><a href="#thumbnail" role="tab" data-toggle="tab">Thumbnail</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="vietnamese">
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'name_vi')->textInput(['maxlength' => true, 'class' => 'form-control sAlias']) ?>
                    <?= $form->field($model, 'slug')->textInput(['class' => 'form-control tAlias']) ?>
                    <div class="row">
                        <div class="col-md-4">
                            <?=
                            $form->field($model, 'parent')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(backend\models\Categorys::find()->all(), 'id', 'name_vi'),
                                'language' => 'vi',
                                'options' => ['placeholder' => 'Chọn danh mục...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>   
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'price')->textInput() ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'price_promotion')->textInput() ?>
                        </div>
                    </div>
                    <?=
                    $form->field($model, 'tag')->widget(TagsinputWidget::classname(), [
                        'clientOptions' => [
                            'trimValue' => true,
                            'allowDuplicates' => true,
                        ]
                    ]);
                    ?>
                    <?= $form->field($model, 'des_vi')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'content_vi')->textarea(['rows' => 6, 'class' => 'ckeditor']) ?> 

                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody' => '.container-items', // required: css class selector
                                'widgetItem' => '.item', // required: css class
                                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                                'min' => 0, // 0 or 1 (default 1)
                                'insertButton' => '.add-item', // css class
                                'deleteButton' => '.remove-item', // css class
                                'model' => $modelsProductsOp[0],
                                'formId' => 'dynamic-form',
                                'formFields' => [
                                    'name_vi',
                                    'name_en',
                                    'value_vi',
                                    'value_en',
                                ],
                            ]);
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-envelope"></i> Thông số sản phẩm
                                    <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Option</button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body container-items"><!-- widgetContainer -->
                                    <?php foreach ($modelsProductsOp as $index => $modelProductsOp): ?>
                                        <div class="item panel panel-default"><!-- widgetBody -->
                                            <div class="panel-heading">
                                                <span class="panel-title-op pull-left">Option: <?= ($index + 1) ?></span>
                                                <div class="pull-right">
                                                    <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-body">
                                                <?php
                                                // necessary for update action.
                                                if (!$modelProductsOp->isNewRecord) {
                                                    echo Html::activeHiddenInput($modelProductsOp, "[{$index}]id");
                                                }
                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <?= $form->field($modelProductsOp, "[{$index}]name_vi")->textInput() ?>
                                                        <?php
                                                        if (Yii::$app->MyComponent->lang_num == 2) {
                                                            echo $form->field($modelProductsOp, "[{$index}]name_en")->textInput();
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <?= $form->field($modelProductsOp, "[{$index}]value_vi")->textInput() ?>
                                                        <?php
                                                        if (Yii::$app->MyComponent->lang_num == 2) {
                                                            echo $form->field($modelProductsOp, "[{$index}]value_en")->textInput();
                                                        }
                                                        ?>
                                                    </div>
                                                </div><!-- end:row -->
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php DynamicFormWidget::end(); ?>
                        </div>
                    </div>
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
                        <img class="img-select img-responsive img-thumbnail" src="<?= $img; ?>" alt="Chọn hình" onclick="BrowseServer('Images:/', 'products-image');" />
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
            <?= $form->field($model, 'des_en')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'content_en')->textarea(['rows' => 6, 'class' => 'ckeditor']) ?>

        </div>
        <div class="tab-pane" id="thumbnail">
            <div class="profile-userbuttons">
                <span onclick="BrowseServerThumb('Images:/', 'products-thumb')" class="btn btn-success fileinput-button" style="margin-bottom: 20px;">
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
                                            <div class="text-center removeimg"><a href="javascript:;" class="btn default btn-sm" onclick="removeValue('<?php echo $items; ?>', 'products-thumb');return false;"><i class="fa fa-times"></i> Remove </a></div>
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs(
        "$(document).ready(function () {
        $('#products-image').bind('change', function () {
            $('.img-select').attr('src', $(this).val());
        });
        $('.delete').click(function () {
            $('.img-select').attr('src', '/webadmin/images/400x200.jpg');
            $('#products-image').val('');
            $('.delete').hide();
        });
        $('.bootstrap-tagsinput').addClass('form-control');
    });"
);
?>