<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Config', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'name_vi',
            'name_en',
            'phone',
            'address_vi:ntext',
            //'email:email',
            //'fanpage:ntext',
            //'website:ntext',
            //'map:ntext',
            //'address_en:ntext',
            //'title:ntext',
            //'keyword:ntext',
            //'description:ntext',
            //'logo:ntext',
            //'favicon:ntext',
            //'banner:ntext',
            //'lang',
            //'headtag:ntext',
            //'bodytag:ntext',
            //'heading:ntext',
            //'customcss:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
