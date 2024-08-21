<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Baogia */

$this->title = 'Cập nhật: ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Baogias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="baogia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
