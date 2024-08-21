<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Baogia */

$this->title = 'Thêm mới khách hàng';
$this->params['breadcrumbs'][] = ['label' => 'Baogias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baogia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
