<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConfigsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tùy chỉnh website';
$this->params['breadcrumbs'][] = $this->title;
CrudAsset::register($this);
?>
<div id="ajaxCrudDatatable">
    <?=
    GridView::widget([
        'id' => 'crud-datatable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'vermid'],
        'pjax' => true,
        'responsiveWrap' => false,
        'pjaxSettings' => [
            'neverTimeout' => true,
        ],
        'pager' => [
            'options' => ['class' => 'pagination'], // set clas name used in ui list of pagination
            'prevPageLabel' => 'Previous', // Set the label for the "previous" page button
            'nextPageLabel' => 'Next', // Set the label for the "next" page button
            'firstPageLabel' => 'First', // Set the label for the "first" page button
            'lastPageLabel' => 'Last', // Set the label for the "last" page button
            'nextPageCssClass' => 'next', // Set CSS class for the "next" page button
            'prevPageCssClass' => 'prev', // Set CSS class for the "previous" page button
            'firstPageCssClass' => 'first', // Set CSS class for the "first" page button
            'lastPageCssClass' => 'last', // Set CSS class for the "last" page button
            'maxButtonCount' => 10, // Set maximum number of page buttons that can be displayed
        ],
        'columns' => [
            [
                'class' => 'kartik\grid\CheckboxColumn',
                'width' => '20px',
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'language',
                'value' => function($model) {
                    if ($model->language == 'vi') {
                        return 'Tiếng Việt';
                    } elseif ($model->language == 'en') {
                        return 'Tiếng Anh';
                    } else {
                        return 'Tất cả';
                    }
                },
                'editableOptions' => [
                    'inputType' => '\kartik\select2\Select2',
                    'options' =>
                    [
                        'data' => ['all' => 'Tất cả', 'vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh'],
                    ],
                ],
                'filter' => ['all' => 'Tất cả', 'vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh'],
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'name',
                'contentOptions' => ['style' => 'white-space: unset;'],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'key',
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'type',
                'value' => function($model) {
                    if ($model->type == 'area') {
                        return 'TextArea';
                    } elseif ($model->type == 'img') {
                        return 'Image';
                    } elseif ($model->type == 'editor') {
                        return 'Editor';
                    } elseif ($model->type == 'file') {
                        return 'File';
                    }  else {
                        return 'Text';
                    }
                },
                'editableOptions' => [
                    'inputType' => '\kartik\select2\Select2',
                    'options' =>
                    [
                        'data' => ['text' => 'Text', 'area' => 'TextArea', 'img' => 'Image', 'editor' => 'Editor', 'file' => 'File'],
                    ],
                ],
                'filter' => ['text' => 'Text', 'area' => 'TextArea', 'img' => 'Image', 'editor' => 'Editor', 'file' => 'File'],
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{edit}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('Xem', $url, ['class' => 'btn btn-xs btn-primary']);
                    },
                    'edit' => function ($url, $model) {
                        return Html::a('Thay đổi', $url, ['class' => 'btn btn-xs btn-success']);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('Sửa', $url, ['class' => 'btn btn-xs btn-success']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('Xóa', $url, ['class' => 'btn btn-xs btn-danger',
                                    'data-confirm' => 'Bạn có chắc chắn muốn xóa ' . $model->name,
                                    'data-method' => 'post',
                        ]);
                    },
                ],
            ],
        ],
        'toolbar' => [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['title' => 'Thêm mới', 'class' => 'btn btn-default']) .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                '{toggleData}' .
                '{export}'
            ],
        ],
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'panel' => [
            'type' => 'primary',
            'heading' => '<i class="glyphicon glyphicon-list"></i> ' . $this->title,
            'before' => '<em>* Thay đổi kích thước các cột trong bảng giống như một bảng tính bằng cách kéo các cạnh cột.</em>',
//            'after' => BulkButtonWidget::widget([
//                'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All', ["bulkdelete"], [
//                    "class" => "btn btn-danger btn-xs",
//                    'role' => 'modal-remote-bulk',
//                    'data-confirm' => false, 'data-method' => false, // for overide yii data api
//                    'data-request-method' => 'post',
//                    'data-confirm-title' => 'Are you sure?',
//                    'data-confirm-message' => 'Bạn có chắc chắn muốn xóa mục này không?'
//                ]),
//            ]) .
//            '<div class="clearfix"></div>',
        ]
    ]);
    ?>
</div>
<?php
Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
])
?>
<?php Modal::end(); ?>
