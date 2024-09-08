<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */

$select2Options = [
    'multiple' => false,
    'theme' => 'krajee',
    'placeholder' => 'Chọn Item...',
    'language' => 'vi',
    'width' => '100%',
];
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?=
            $form->field($model, 'model')->widget(Select2::classname(), [
                'data' => $arrModel,
                'language' => 'vi',
                'options' => ['placeholder' => 'Chọn Kiểu...'],
                'pluginEvents' => [
                    'select2:select' => 'function(e) { changeItem(e.params.data.id); }',
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?=
            $form->field($model, 'model_id')->widget(Select2::classname(), [
                'data' => $data,
                'language' => 'vi',
                'options' => ['placeholder' => 'Chọn kiểu menu trước...'],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?=
            $form->field($model, 'parent')->widget(Select2::classname(), [
                'data' => ArrayHelper::merge(["0" => "Là danh mục chính"], ArrayHelper::map($arrList, 'id', 'name_vi')),
                'language' => 'vi',
            ]);
            ?>
        </div>
    </div>
    <?php ob_start(); // output buffer the javascript to register later 
    ?>
    <script>
        function changeItem(model) {
            var url = '<?= Url::to(['menu/changeitem', 'model' => '-model-']) ?>';
            var $select = $('#menu-model_id');
            $select.find('option').remove().end();
            $.ajax({
                url: url.replace('-model-', model),
                success: function(data) {
                    var select2Options = <?= Json::encode($select2Options) ?>;
                    select2Options.data = data.data;
                    $select.select2(select2Options);
                    $select.val(data.selected).trigger('change');
                }
            });
        }
    </script>
    <?php $this->registerJs(str_replace(['<script>', '</script>'], '', ob_get_clean()), View::POS_END); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>