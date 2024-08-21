<?php

use yii\helpers\Html;
use common\models\Admin;

/* @var $this yii\web\View */
/* @var $model backend\models\SignupForm */

$this->title = 'Đổi mật khẩu: ' . Admin::findById(empty($_GET['id']) ? 1 : $_GET['id'])->username;
$this->params['breadcrumbs'][] = ['label' => 'Signup Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reset-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_resetform', [
        'model' => $model,
    ])
    ?>

</div>
