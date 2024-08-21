<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Categorys */

$this->title = 'Thêm danh mục';
$this->params['breadcrumbs'][] = ['label' => 'Categorys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrList' => $arrList,
    ]) ?>

</div>
