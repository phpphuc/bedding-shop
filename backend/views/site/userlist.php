<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SignupFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách thành viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signup-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'vermid'],
        'rowOptions' => function ($model) {
            if ($model->status == 10) {
                return ['class' => 'success'];
            } else {
                return ['class' => 'danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'username',
            'email',
            [
                'attribute' => 'status',
                'label' => 'Active',
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
                'filter' => array('0' => 'Non-Active', '10' => 'Active'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '150px'
                    ],
                ],
                'contentOptions' => ['style' => 'text-align: center;'],
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{reset} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('Xem', $url, ['class' => 'btn btn-xs btn-primary']);
                    },
                    'reset' => function ($url, $model) {
                        return Html::a('Đổi Pass', $url, ['class' => 'btn btn-xs btn-success']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('Xóa', $url, ['class' => 'btn btn-xs btn-danger',
                                    'data-confirm' => 'Bạn có chắc chắn muốn xóa ' . $model->username,
                                    'data-method' => 'post',
                        ]);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
