<?php

use yii\helpers\Html;
use Imagine\Image\ManipulatorInterface;
use backend\models\Postscat;
use backend\models\Posts;

$tintucs = Postscat::find()->where(['status' => 1, 'homepage' => 1, 'id' => 24])->orderBy('number asc, id desc')->one();
    if ($tintucs) {
        $nameDM = $tintucs['name_' . Yii::$app->language];
        $desDM = $tintucs['des_' . Yii::$app->language];
        $modelCategory = (new Postscat())->getCateChild($tintucs['id']);
        if ($modelCategory) {
            
            $newAll = Posts::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory) . ')')->orderBy('number asc, id desc')->asArray()->all();
        } else {
            
            $newAll = Posts::find()->where('status = 1 and parent = ' . $tintucs['id'])->orderBy('number asc, id desc')->asArray()->all();
        }
        ?>

<div class="title_khachhang text-center">
    <h3><?= $nameDM ?></h3>
    <p><?= $desDM; ?></p>
</div>
    <div class="owl-carousel owl-theme owl-carousel4-brands">
            <?php
            if ($newAll) {
                $stt = 0;
                foreach ($newAll as $items2) :
                    $stt++;
                    $linkN2 = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items2['slug']);
                    $nameN2 = $items2['name_' . Yii::$app->language];
                    $desN2 = $items2['des_' . Yii::$app->language];
                    $imgN2 = $items2['image'];
                
                        ?>
                        <div class="khung_tt">
                            <img src="<?= $imgN2 ?>" alt="<?= $nameN2 ?>"/>
                            <h3><a href="<?= $linkN2; ?>"><?= Yii::$app->MyComponent->myTruncate($nameN2, 45, " ", "..."); ?></a> </h3>
                            <p><?= Yii::$app->MyComponent->myTruncate($desN2, 150, " ", "..."); ?></p>
                        </div>
                   <?php
                endforeach;
            }
            ?>

    </div>
    <?php
}
?>