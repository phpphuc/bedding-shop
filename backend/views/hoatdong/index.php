<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HoatdongSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hoatdongs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoatdong-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hoatdong', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_vi',
            'name_en',
            'des_vi:ntext',
            'des_en:ntext',
            //'thumb:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
