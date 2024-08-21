<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SignupForm */

$this->title = 'Thêm thành viên';
$this->params['breadcrumbs'][] = ['label' => 'Signup Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signup-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
