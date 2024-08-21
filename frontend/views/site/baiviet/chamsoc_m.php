<?php

use yii\helpers\Html;
use Imagine\Image\ManipulatorInterface;
use backend\models\Postscat;
use backend\models\Posts;

$giunetthanhxuan = Postscat::find()->where(['status' => 1, 'homepage' => 1, 'id' => 16])->orderBy('number asc, id desc')->one();
if ($giunetthanhxuan) {
    $nameDM = $giunetthanhxuan['name_' . Yii::$app->language];
    $modelCategory2 = (new Postscat())->getCateChild($giunetthanhxuan['id']);
    if ($modelCategory2) {

        $newAllgiunet = Posts::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory2) . ')')->limit(6)->orderBy('number asc, id desc')->asArray()->all();
    } else {

        $newAllgiunet = Posts::find()->where('status = 1 and parent = ' . $giunetthanhxuan['id'])->limit(6)->orderBy('number asc, id desc')->asArray()->all();
    }
    ?>

    <div class="title_violet text-center"><?= $nameDM ?></div>
    <div class="row">
        <div class="col-md-6 text-center"></div>
        <div class="col-md-4 text-left padding-left-0">
            <?php
            if ($newAllgiunet) {
                $stt = 0;
                foreach ($newAllgiunet as $items2) :
                    $stt++;
                    $linkN2 = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items2['slug']);
                    $nameN2 = $items2['name_' . Yii::$app->language];
                    $desN2 = $items2['des_' . Yii::$app->language];
                    $imgN2 = $items2['image'];
                    
                        ?>
                        <div class="khunggiunet" style="margin-left: 15px;">
                            <p>0<?= $stt ?></p> <span><?= $nameN2; ?></span>
                        </div>
                    <?php
                endforeach;
            }
            ?>
        </div>
        <div class="col-md-2 text-center"></div>
    </div>
    <?php
}
?>