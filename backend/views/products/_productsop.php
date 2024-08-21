<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsOpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-op-index">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name_vi:ntext',
            [
                'attribute' => 'name_en',
                'visible' => ($rowvisible),
            ],
            'value_vi:ntext',
            [
                'attribute' => 'value_en',
                'visible' => ($rowvisible),
            ],
        ],
    ]);
    ?>
</div>
