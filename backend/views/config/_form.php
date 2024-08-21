<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use conquer\codemirror\CodemirrorWidget;
use conquer\codemirror\CodemirrorAsset;
use yii\web\JsExpression;
use jlorente\remainingcharacters\RemainingCharacters;

/* @var $this yii\web\View */
/* @var $model backend\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">

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
                    <?= $form->field($model, 'address_vi')->textarea(['rows' => 6, 'class' => 'ckeditor']) ?>
                    <?= $form->field($model, 'phone')->textInput(['class' => 'form-control']) ?>
                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control']) ?>
                    <?= $form->field($model, 'website')->textInput(['class' => 'form-control']) ?>
                    <?= $form->field($model, 'fanpage')->textInput(['class' => 'form-control']) ?>
                    <?= $form->field($model, 'map')->textInput(['class' => 'form-control']) ?>
                    <?=
                    $form->field($model, 'heading')->widget(CodemirrorWidget::className(), [
                        'assets' => [
                            CodemirrorAsset::THEME_RUBYBLUE,
                            CodemirrorAsset::ADDON_EDIT_MATCHBRACKETS,
                            CodemirrorAsset::MODE_XML,
                        ],
                        'settings' => [
                            'lineNumbers' => true,
                            'matchBrackets' => true,
                            'theme' => 'rubyblue',
                            'mode' => 'xml',
                        ],
                    ]);
                    ?>
                    <?=
                    $form->field($model, 'headtag')->widget(CodemirrorWidget::className(), [
                        'assets' => [
                            CodemirrorAsset::THEME_RUBYBLUE,
                            CodemirrorAsset::ADDON_EDIT_MATCHBRACKETS,
                            CodemirrorAsset::MODE_XML,
                        ],
                        'settings' => [
                            'lineNumbers' => true,
                            'matchBrackets' => true,
                            'theme' => 'rubyblue',
                            'mode' => 'xml',
                        ],
                    ]);
                    ?>
                    <?=
                    $form->field($model, 'bodytag')->widget(CodemirrorWidget::className(), [
                        'assets' => [
                            CodemirrorAsset::THEME_RUBYBLUE,
                            CodemirrorAsset::ADDON_EDIT_MATCHBRACKETS,
                            CodemirrorAsset::MODE_XML,
                        ],
                        'settings' => [
                            'lineNumbers' => true,
                            'matchBrackets' => true,
                            'theme' => 'rubyblue',
                            'mode' => 'xml',
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
                            'rows' => '6',
                            //'class' => 'col-md-12',
                            'maxlength' => 300,
                            'placeholder' => 'Viết mô tả...'
                        ]
                    ]);
                    ?>

                    <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>
                    <div class="form-group">
                        <?= $form->field($model, 'banner')->hiddenInput()->label(); ?>               
                        <?php
                        $banner = $model->banner ? trim($model->banner) : Yii::$app->homeUrl . '/images/400x200.jpg';
                        ?>
                        <img class="banner-select img-responsive img-thumbnail" src="<?= $banner; ?>" alt="Chọn hình" onclick="BrowseServer('Images:/', 'config-banner');" />
                        <?php if ($model->banner) { ?>
                            <button type="button" class="btn btn-danger btn-sm profile-edit delete-banner">Delete</button>
                        <?php } else {
                            ?>
                            <button type="button" class="btn btn-danger btn-sm profile-edit delete-banner" style="display: none;">Delete</button>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'logo')->hiddenInput()->label(); ?>               
                        <?php
                        $logo = $model->logo ? trim($model->logo) : Yii::$app->homeUrl . '/images/400x200.jpg';
                        ?>
                        <img class="logo-select img-responsive img-thumbnail" src="<?= $logo; ?>" alt="Chọn hình" onclick="BrowseServer('Images:/', 'config-logo');" />
                        <?php if ($model->logo) { ?>
                            <button type="button" class="btn btn-danger btn-sm profile-edit delete-logo">Delete</button>
                        <?php } else {
                            ?>
                            <button type="button" class="btn btn-danger btn-sm profile-edit delete-logo" style="display: none;">Delete</button>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'favicon')->hiddenInput()->label(); ?>               
                        <?php
                        $favicon = $model->favicon ? trim($model->favicon) : Yii::$app->homeUrl . '/images/400x200.jpg';
                        ?>
                        <img class="favicon-select img-responsive img-thumbnail" src="<?= $favicon; ?>" alt="Chọn hình" onclick="BrowseServer('Images:/', 'config-favicon');" />
                        <?php if ($model->favicon) { ?>
                            <button type="button" class="btn btn-danger btn-sm profile-edit delete-favicon">Delete</button>
                        <?php } else {
                            ?>
                            <button type="button" class="btn btn-danger btn-sm profile-edit delete-favicon" style="display: none;">Delete</button>
                            <?php
                        }
                        ?>

                    </div>
                    <?=
                    $form->field($model, 'schema')->widget(CodemirrorWidget::className(), [
                        'assets' => [
                            CodemirrorAsset::THEME_3024_NIGHT,
                            CodemirrorAsset::ADDON_EDIT_MATCHBRACKETS,
                            CodemirrorAsset::MODE_XML,
                        ],
                        'settings' => [
                            'lineNumbers' => true,
                            'matchBrackets' => true,
                            'theme' => '3024-night',
                            'mode' => 'xml',
                        ],
                    ]);
                    ?>
                    <?=
                    $form->field($model, 'customcss')->widget(CodemirrorWidget::className(), [
                        'assets' => [
                            CodemirrorAsset::THEME_3024_NIGHT,
                            CodemirrorAsset::ADDON_EDIT_MATCHBRACKETS,
                            CodemirrorAsset::MODE_CSS,
                            CodemirrorAsset::ADDON_HINT_SHOW_HINT,
                        ],
                        'settings' => [
                            'lineNumbers' => true,
                            'matchBrackets' => true,
                            'theme' => '3024-night',
                            'mode' => 'css',
                            'extraKeys' => [
                                "'{'" => new JsExpression("function(cm, pred) {var cur = cm.getCursor();if (!pred || pred())setTimeout(function () {if (!cm.state.completionActive)cm.showHint({completeSingle: false});}, 100);return CodeMirror.Pass;}"),
                                "':'" => new JsExpression("function(cm, pred) {var cur = cm.getCursor();if (!pred || pred())setTimeout(function () {if (!cm.state.completionActive)cm.showHint({completeSingle: false});}, 100);return CodeMirror.Pass;}"),
                                "';'" => new JsExpression("function(cm, pred) {var cur = cm.getCursor();if (!pred || pred())setTimeout(function () {if (!cm.state.completionActive)cm.showHint({completeSingle: false});}, 100);return CodeMirror.Pass;}"),
                                "Ctrl-Space" => "autocomplete"
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="english">
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'address_en')->textarea(['rows' => 6, 'class' => 'ckeditor']) ?>
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
        $('#config-banner').bind('change', function () {
            $('.banner-select').attr('src', $(this).val());
        });
        $('.delete-banner').click(function () {
            $('.banner-select').attr('src', '/webadmin/images/400x200.jpg');
            $('#config-banner').val('');
            $('.delete-banner').hide();
        });
        $('#config-logo').bind('change', function () {
            $('.logo-select').attr('src', $(this).val());
        });
        $('.delete-logo').click(function () {
            $('.logo-select').attr('src', '/webadmin/images/400x200.jpg');
            $('#config-logo').val('');
            $('.delete-logo').hide();
        });
        $('#config-favicon').bind('change', function () {
            $('.favicon-select').attr('src', $(this).val());
        });
        $('.delete-favicon').click(function () {
            $('.favicon-select').attr('src', '/webadmin/images/400x200.jpg');
            $('#config-favicon').val('');
            $('.delete-favicon').hide();
        });
    });"
);
$this->registerCss(
        ".cm-s-rubyblue{height: 150px;}"
);
?>