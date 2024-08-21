<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Slideshow */

$this->title = 'Thêm slide';
$this->params['breadcrumbs'][] = ['label' => 'Slideshows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slideshow-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
