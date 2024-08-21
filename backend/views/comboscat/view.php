<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Categorys */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categorys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorys-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name_vi',
            //'name_en',
            'des_vi:ntext',
            //'des_en:ntext',
            'content_vi:ntext',
            //'content_en:ntext',
            //'parent',
            'slug:ntext',
            //'image:ntext',
            //'homepage',
            'number',
            'title:ntext',
            'description:ntext',
            'keyword:ntext',
            'created_date',
            'updated_date',
        ],
    ]) ?>

</div>
