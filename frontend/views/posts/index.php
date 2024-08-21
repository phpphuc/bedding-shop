<?php
/* @var $this yii\web\View */
use TonchikTm\Yii2Thumb\ImageThumb;
$this->title = $model['title'];
?>

<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <a class="mybreadcrumb__step" href="javascript:;"><?= $model['name_' . Yii::$app->language] ?></a>
            </div>
            <div class="clearfix margin-bottom-30"></div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($models) {
            $stt = 0;
            foreach ($models as $keyN => $valueN) {
                $stt++;
                $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $valueN['slug']);
                $nameN = $valueN['name_' . Yii::$app->language];
                $desN = $valueN['des_' . Yii::$app->language];
                if ($valueN['image']) {
                    $imgN = $valueN['image'];
                } else {
                    $imgN = '/frontend/web/desktop/images/no-img.jpg';
                }
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 margin-bottom-30">
                   
                      
                            <div><a href="<?= $linkN; ?>" title="<?= $nameN; ?>">
                            <img src="<?= $imgN ?>" alt="<?= $nameN; ?>" class="lazy">
                            </a></div>
                      
                     
                            <div class="_namett-detail"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><h2><?= $nameN; ?></h2></a></div>
                            <div class="text-justify">
                            <?php if($model['id'] != 16){ ?>
                            <?= Yii::$app->MyComponent->myTruncate($desN, 180, " ", " [...]"); ?>
                              <?php } else {?>
                              <?php echo $desN; ?>
                              <?php   } ?>  
                            </div>
                       
                 
                </div>
                <?php

                                  if ($stt % 3 == 0) { ?> 
                                        <div class="clearfix"></div>
                                    <?php
                                    }
               
            }
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <?=
            yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </div>
    </div>
</div>