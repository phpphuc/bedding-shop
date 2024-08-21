<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Configs */

$this->title = 'Tùy chỉnh nội dung: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="configs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_edit', [
        'model' => $model,
    ]) ?>

</div>
