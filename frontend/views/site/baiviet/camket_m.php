<?php

use yii\helpers\Html;
use Imagine\Image\ManipulatorInterface;
use backend\models\Postscat;
use backend\models\Posts;

$chamsoc = Postscat::find()->where(['status' => 1, 'homepage' => 1, 'id' => 15])->orderBy('number asc, id desc')->one();
if ($chamsoc) {
    $nameDM = $chamsoc['name_' . Yii::$app->language];
    $modelCategory = (new Postscat())->getCateChild($chamsoc['id']);
    if ($modelCategory) {

        $newAll = Posts::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory) . ')')->orderBy('number asc, id desc')->asArray()->all();
    } else {

        $newAll = Posts::find()->where('status = 1 and parent = ' . $chamsoc['id'])->orderBy('number asc, id desc')->asArray()->all();
    }
    ?>
                <?php
                if ($newAll) {
                    foreach ($newAll as $items) :
                        $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items['slug']);
                        $nameN = $items['name_' . Yii::$app->language];
                        $desN = $items['des_' . Yii::$app->language];
                        $imgN = $items['image'];
                        ?>
                       
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-right-5">
                                    <div class="img_chamsoc"><a href="<?= $linkN; ?>"><img src="<?= $imgN; ?>" alt="<?= $nameN ?>" /></a></div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 padding-left-0">
                                    <div class="title_chamsoc"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= $nameN; ?></a></div>
                                    <div class="nd_chamsoc"><?= Yii::$app->MyComponent->myTruncate($desN, 100, " ", "..."); ?></div>
                                </div>
                            </div>
                <div class="margin-bottom-10 clearfix"></div>
                        <?php
                    endforeach;
                }
                ?>
    <?php
}
?>