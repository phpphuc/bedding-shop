<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Config */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="config-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
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
            'ID',
            'name_vi',
            'name_en',
            'phone',
            'address_vi:ntext',
            'email:email',
            'fanpage:ntext',
            'website:ntext',
            'map:ntext',
            'address_en:ntext',
            'title:ntext',
            'keyword:ntext',
            'description:ntext',
            'logo:ntext',
            'favicon:ntext',
            'banner:ntext',
            'lang',
            'headtag:ntext',
            'bodytag:ntext',
            'heading:ntext',
            'customcss:ntext',
        ],
    ]) ?>

</div>
