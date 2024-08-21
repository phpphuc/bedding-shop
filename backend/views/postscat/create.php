<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Postscat */

$this->title = 'Thêm danh mục';
$this->params['breadcrumbs'][] = ['label' => 'Postscats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postscat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrList' => $arrList,
    ]) ?>

</div>
