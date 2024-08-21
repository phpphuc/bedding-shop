<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Camket */

$this->title = 'Cập nhật: ' . $model->name_vi;
$this->params['breadcrumbs'][] = ['label' => 'Camkets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_vi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="camnhan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
