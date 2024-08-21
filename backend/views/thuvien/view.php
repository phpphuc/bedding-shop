<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Thuvien */
?>
<div class="thuvien-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name_vi',
            'name_en',
            'slug:ntext',
            'image:ntext',
            'thumb:ntext',
            'number',
        ],
    ]) ?>

</div>
