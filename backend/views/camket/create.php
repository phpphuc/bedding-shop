<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Camket */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Camkets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
