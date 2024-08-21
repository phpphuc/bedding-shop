<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Slideshowcat */

$this->title = 'Thêm danh mục';
$this->params['breadcrumbs'][] = ['label' => 'Slideshowcats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slideshowcat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
