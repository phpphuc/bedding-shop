<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use backend\models\ProductsOpSearch;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản phẩm';
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
                'class' => 'kartik\grid\ExpandRowColumn',
                'expandAllTitle' => 'Expand all',
                'collapseTitle' => 'Collapse all',
                'expandIcon' => '<span class="glyphicon glyphicon-expand"></span>',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new ProductsOpSearch();
                    $searchModel->parent = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    $rowvisible = 0;
                    if (Yii::$app->MyComponent->lang_num == 2) {
                        $rowvisible = 1;
                    }
                    return Yii::$app->controller->renderPartial('_productsop', [
                        'dataProvider' => $dataProvider,
                        'rowvisible' => $rowvisible
                    ]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
            [
                'attribute' => 'name_vi',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'parent',
                'label' => 'Thuộc về danh mục',
                'value' => 'categoryParent.name_vi',
                'editableOptions' => [
                    'inputType' => '\kartik\select2\Select2',
                    'options' =>
                    [
                        'data' => ArrayHelper::map(backend\models\Categorys::find()->all(), 'id', 'name_vi'),
                    ],
                ],
                'filter' => ArrayHelper::map(backend\models\Categorys::find()->asArray()->all(), 'id', 'name_vi'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            ],
            [
                'label' => 'Hình ảnh',
                'attribute' => 'image',
                'value' => function($model) {
                    if ($model->image) {
                        return $model->image;
                    } else {
                        return Yii::$app->homeUrl . '/images/no_image.png';
                    }
                },
                'contentOptions' => ['style' => 'text-align: center;'],
                'format' => ['image', ['width' => '60px', 'height' => 'auto']],
            ],
            [
                'attribute' => 'feature',
                'value' => function ($model) {
                    return SwitchInput::widget([
                        'name' => 'feature',
                        'value' => $model['feature'],
                        'items' => SwitchInput::CHECKBOX,
                        'pluginOptions' => [
                            'size' => 'mini',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                            'onText' => 'Yes',
                            'offText' => 'No',
                        ],
                        'pluginEvents' => [
                            'switchChange.bootstrapSwitch' => 'function() { 
                                        $.post("feature", {"id": ' . $model['id'] . '}, function (data) {
                                            location.reload();
                                        });
                                        
                                    }',
                        ],
                    ]);
                },
                'contentOptions' => ['class' => 'text-center _switchCss'],
                'format' => 'raw',
            ],
//            [
//                'attribute' => 'new',
//                'value' => function ($model) {
//                    return SwitchInput::widget([
//                        'name' => 'new',
//                        'value' => $model['new'],
//                        'items' => SwitchInput::CHECKBOX,
//                        'pluginOptions' => [
//                            'size' => 'mini',
//                            'onColor' => 'success',
//                            'offColor' => 'danger',
//                            'onText' => 'Yes',
//                            'offText' => 'No',
//                        ],
//                        'pluginEvents' => [
//                            'switchChange.bootstrapSwitch' => 'function() { 
//                                        $.post("new", {"id": ' . $model['id'] . '}, function (data) {
//                                            location.reload();
//                                        });
//                                        
//                                    }',
//                        ],
//                    ]);
//                },
//                'contentOptions' => ['class' => 'text-center _switchCss'],
//                'format' => 'raw',
//            ],
//            [
//                'attribute' => 'bestseller',
//                'value' => function ($model) {
//                    return SwitchInput::widget([
//                        'name' => 'bestseller',
//                        'value' => $model['bestseller'],
//                        'items' => SwitchInput::CHECKBOX,
//                        'pluginOptions' => [
//                            'size' => 'mini',
//                            'onColor' => 'success',
//                            'offColor' => 'danger',
//                            'onText' => 'Yes',
//                            'offText' => 'No',
//                        ],
//                        'pluginEvents' => [
//                            'switchChange.bootstrapSwitch' => 'function() { 
//                                        $.post("bestseller", {"id": ' . $model['id'] . '}, function (data) {
//                                            location.reload();
//                                        });
//                                        
//                                    }',
//                        ],
//                    ]);
//                },
//                'contentOptions' => ['class' => 'text-center _switchCss'],
//                'format' => 'raw',
//            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return SwitchInput::widget([
                        'name' => 'status',
                        'value' => $model['status'],
                        'items' => SwitchInput::CHECKBOX,
                        'pluginOptions' => [
                            'size' => 'mini',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                            'onText' => 'Yes',
                            'offText' => 'No',
                        ],
                        'pluginEvents' => [
                            'switchChange.bootstrapSwitch' => 'function() { 
                                        $.post("status", {"id": ' . $model['id'] . '}, function (data) {
                                            location.reload();
                                        });
                                        
                                    }',
                        ],
                    ]);
                },
                'contentOptions' => ['class' => 'text-center _switchCss'],
                'format' => 'raw',
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'number',
                'contentOptions' => ['class' => 'text-center'],
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('Xem', $url, ['class' => 'btn btn-xs btn-primary']);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('Sửa', $url, ['class' => 'btn btn-xs btn-success']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('Xóa', $url, ['class' => 'btn btn-xs btn-danger',
                            'data-confirm' => 'Bạn có chắc chắn muốn xóa ' . $model->name_vi,
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
            'after' => BulkButtonWidget::widget([
                'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All', ["bulkdelete"], [
                    "class" => "btn btn-danger btn-xs",
                    'role' => 'modal-remote-bulk',
                    'data-confirm' => false, 'data-method' => false, // for overide yii data api
                    'data-request-method' => 'post',
                    'data-confirm-title' => 'Are you sure?',
                    'data-confirm-message' => 'Bạn có chắc chắn muốn xóa mục này không?'
                ]),
            ]) .
            '<div class="clearfix"></div>',
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