<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Slideshow */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Slideshows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slideshow-view">

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
            'parent',
            'name_vi',
            'name_en',
            'des_vi:ntext',
            'des_en:ntext',
            'content_vi:ntext',
            'content_en:ntext',
            'slug:ntext',
            'link:ntext',
            'image:ntext',
            'thumb:ntext',
            'number',
            'homepage',
        ],
    ]) ?>

</div>
