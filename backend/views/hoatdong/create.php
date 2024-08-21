<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hoatdong */

$this->title = 'Create Hoatdong';
$this->params['breadcrumbs'][] = ['label' => 'Hoatdongs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoatdong-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
