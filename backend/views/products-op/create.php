<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductsOp */

$this->title = 'Create Products Op';
$this->params['breadcrumbs'][] = ['label' => 'Products Ops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-op-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
