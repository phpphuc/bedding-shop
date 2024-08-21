<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Configs */

$this->title = 'Tùy chỉnh website';
$this->params['breadcrumbs'][] = ['label' => 'Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
