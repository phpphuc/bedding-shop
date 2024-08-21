<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BaogiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách đặt hẹn';
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
                'attribute' => 'fullname',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'attribute' => 'phone',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'attribute' => 'email',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'attribute' => 'phongkham',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'attribute' => 'bacsi',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'attribute' => 'thoigian',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'attribute' => 'content',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'status',
                'label' => 'Tình trạng',
                'value' => function ($model) {
                    if ($model->status == 0) {
                        return 'Chưa xử lý';
                    } elseif ($model->status == 1) {
                        return 'Đã đến';
                    } elseif ($model->status == 2) {
                        return 'Không đến';
                    }
                },
                'editableOptions' => [
                    'inputType' => '\kartik\select2\Select2',
                    'options' =>
                    [
                        'data' => ['0' => 'Chưa xử lý', '1' => 'Đã đến', '2' => 'Không đến'],
                    ],
                ],
                'filter' => ['0' => 'Chưa xử lý', '1' => 'Đã đến', '2' => 'Không đến'],
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '100px'
                    ],
                ],
                'contentOptions' => ['style' => 'text-align: center;'],
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'created_date',
                'value' => function($model) {
                    return Yii::$app->formatter->asDatetime($model->created_date . Yii::$app->getTimeZone(), 'dd/MM/yyyy HH:mm');
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('Sửa', $url, ['class' => 'btn btn-xs btn-success']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('Xóa', $url, ['class' => 'btn btn-xs btn-danger',
                            'data-confirm' => 'Bạn có chắc chắn muốn xóa ' . $model->fullname,
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
