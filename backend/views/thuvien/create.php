<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Thuvien */

$this->title = 'Thêm hình ảnh';
$this->params['breadcrumbs'][] = ['label' => 'Thuviens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thuvien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
