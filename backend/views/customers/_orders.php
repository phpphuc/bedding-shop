<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'vermid'],
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
        ],
        'showPageSummary' => true,
        'hover' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'product_name:ntext',
            [
                'attribute' => 'product_image',
                'value' => function($model) {
                    if ($model->product_image) {
                        return $model->product_image;
                    } else {
                        return Yii::$app->homeUrl . '/images/no_image.png';
                    }
                },
                'contentOptions' => ['style' => 'text-align: center;'],
                'format' => ['image', ['width' => '60px', 'height' => 'auto']],
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'product_price',
                'format'=>['decimal', 0],
            ],
            'product_quantity',
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'product_cost',
                'format'=>['decimal', 0],
                'pageSummary' => true
            ],
        ],
    ]);
    ?>
</div>