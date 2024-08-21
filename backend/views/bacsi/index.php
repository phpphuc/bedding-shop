<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\switchinput\SwitchInput;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bác sĩ';
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
                'attribute' => 'name_vi',
                'contentOptions' => ['style' => 'white-space: unset;']
            ],
            [
                'attribute' => 'image',
                'value' => function($model) {
                    if ($model->image) {
                        return $model->image;
                    } else {
                        return Yii::$app->homeUrl . '/images/no_image.png';
                    }
                },
                'contentOptions' => ['class' => 'text-center'],
                'format' => ['image', ['width' => '60px', 'height' => 'auto']],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'number',
                'contentOptions' => ['style' => 'text-align: center;'],
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
