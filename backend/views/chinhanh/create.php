<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = 'Thêm chi nhánh';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
