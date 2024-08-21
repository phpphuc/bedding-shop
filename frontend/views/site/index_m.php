<?php

use yii\helpers\Html;
use backend\models\Postscat;
use backend\models\Posts;
use TonchikTm\Yii2Thumb\ImageThumb;
use kartik\datetime\DateTimePicker;
use backend\models\Videos;
use backend\models\Gallery;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
$this->title = Yii::$app->MyComponent->website['title'];
?>
<div class="site-index">
    <?php
    if ($pageOne) {
        $linkAb = Yii::$app->urlManager->createUrl('/bai-viet/' . $pageOne['slug']);
        $nameAb = $pageOne['name_' . Yii::$app->language];
        $desAb = $pageOne['des_' . Yii::$app->language];
        $imgAb = $pageOne['image'];
        ?>
        <div class="_bgab">
            <div class="pagewrap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hover14"><a href="<?= $linkAb; ?>" title="<?= $nameAb; ?>"><figure><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgAb), 560, 432, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameAb, 'class' => 'lazy']]]); ?></figure></a></div>
                        <div class="_box-nameab">
                            <div class="_nameab-top"><?= Yii::$app->MyComponent->config['nameab-top_'. Yii::$app->language]; ?></div>
                           
                        </div>
                        <div class="_desab"><?= $desAb; ?></div>
                        
                        <div class="clearfix margin-bottom-15"></div>
                        <div class="_btnab"><a href="<?= $linkAb; ?>" title="<?= $nameAb; ?>"><?= Yii::t('app', 'Read more') ?></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix margin-bottom-30" style="border-bottom: 1px black dashed;"></div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="_loigiatri">
        <div class="pagewrap">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="_namelgt"><?= Yii::t('app', 'Core Value') ?></div>
                    <div class="clearfix margin-bottom-20"></div>
                     <div class="row">
            
                        <?php
                        if ($visaos) {
                             $stt = 0;
                            foreach ($visaos as $key => $value) {
                                   $stt++;
                                $nameVs = $value['name_' . Yii::$app->language];
                                $imgVs = $value['image'];

                                ?>
                                    <div class="col-md-6 text-center">
                                    <div><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgVs), 126, 126, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_INSET], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $nameVs, 'class' => 'lazy']]]); ?></div>
                                    <div class="_nameVs"><?= $nameVs; ?></div>
                                </div>
                                <?php
                                  if ($stt == 2) { ?> 
                                        <div class="clearfix margin-bottom-30"></div>
                                    <?php
                                    }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
     <?php
    if ($dichvus) {
        $nameDM = $dichvus['name_' . Yii::$app->language];
        $desDM = $dichvus['des_' . Yii::$app->language];
        $modelCategory = (new Postscat())->getCateChild($dichvus['id']);
        if ($modelCategory) {
            $newAll = Posts::find()->where(['status' => 1, 'feature' => 1, 'parent' => $modelCategory])->orderBy('number asc, id desc')->limit(4)->asArray()->all();
        } else {
            $newAll = Posts::find()->where(['status' => 1, 'feature' => 1, 'parent' => $dichvus['id']])->orderBy('number asc, id desc')->limit(4)->asArray()->all();
        }
        ?>

        <div class="_dichvus" style="background: url('<?= Yii::$app->MyComponent->config['bgdv_mobile']; ?>') no-repeat; background-size: 100% 100%;     border-top: 5px #fe382d solid;">
            <div class="pagewrap">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="title_dv">
                            <h2 class="my-2 color-brand"><?= $nameDM ?></h2>
                            <h3 class="color-brand"><?= $desDM ?></h3>
                        </div>
                    </div>
                </div>
                <div class="clearfix margin-bottom-40"></div>
                <?php
                if ($newAll) {
                    
                    foreach ($newAll as $items) {
                        
                        $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items['slug']);
                        $nameN = $items['name_' . Yii::$app->language];
                        $imgN = $items['image'];
                        $noidungN = $items['des_' . Yii::$app->language];
                       
                            ?>  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="_hinhdv">
                                        <div class="hover14 _imgDv"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><figure><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgN), 590, 356, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameN, 'class' => 'lazy']]]); ?></figure></a></div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="_boxdv">
                                        <div class="_nameDv"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= $nameN; ?></a></div>
                                        <div class="noidungdv"><?= $noidungN; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix margin-bottom-30"></div>
                        <?php  
                    }
                }
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <div class="_doitac">
            <div class="khungdoitac">
                   <div class="name_khachhang"><span><?= Yii::t('app', 'Our customer') ?></span></div>
                    <div class="clearfix margin-bottom-20"></div>
                <div class="row">


                    <?php
                    $doitac = Gallery::find()->where(['type' => 1, 'homepage' => 1])->orderBy('number asc, id desc')->all();
                    if ($doitac) {
                        foreach ($doitac as $keyV => $valueV) {
                            $name = $valueV['name_' . Yii::$app->language];
                            $link = $valueV['link'];
                            $img = $valueV['image'];
                            ?>
                            <div class="col-sm-6 col-xs-6 text-center">
                                <div class="_itemdoitac">
                                    <a target="_blank" href="<?= $link; ?>" title="<?= $name; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $img), 230, 115, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $name, 'class' => 'lazy']]]); ?></a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
    <?php
    if ($bacsi) {
        ?>
        <div class="_bgbacsi" style="background: url('<?= Yii::$app->MyComponent->config['bgdn']; ?>') no-repeat; background-size: 100% 100%;">
            <div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="_box-title-bs">
                            
                            <div class="_box-title">
                                <div class="_title-bs"><?= Yii::$app->MyComponent->config['title-dn_'. Yii::$app->language]; ?></div>
                                <div class="_des-bs"><?= Yii::$app->MyComponent->config['des-dn_'. Yii::$app->language]; ?></div>
                            </div>
                        </div>
                        <div class="clearfix margin-bottom-30"></div>
                        <div class="_autoplay">
                            <?php
                            foreach ($bacsi as $key => $value) {
                                $namebs = $value['name_' . Yii::$app->language];
                                $desbs = $value['des_' . Yii::$app->language];
                                $imgbs = $value['image'];
                                ?>
                                <div>
                                    <div class="_imgbs"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgbs), 435, 600, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $namebs, 'class' => 'lazy']]]); ?></div>
                                    <div class="_name-bs"><?= $namebs; ?></div>
                                    <div class="_chuyenkhoa"><?= $desbs; ?></div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="clearfix margin-bottom-30"></div>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
   <?php
    if ($tintucs) {
        $nameDM = $tintucs['name_' . Yii::$app->language];
        $modelCategory = (new Postscat())->getCateChild($tintucs['id']);
        if ($modelCategory) {
            $newOne = Posts::find()->where('status = 1 and feature = 1 and parent IN (' . implode(',', $modelCategory) . ')')->orderBy('number asc, id desc')->one();
            $newAll = Posts::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory) . ')')->offset(1)->orderBy('number asc, id desc')->asArray()->all();
        } else {
            $newOne = Posts::find()->where('status = 1 and feature = 1 and parent = ' . $tintucs['id'])->orderBy('number asc, id desc')->one();
            $newAll = Posts::find()->where('status = 1 and parent = ' . $tintucs['id'])->offset(1)->orderBy('number asc, id desc')->asArray()->all();
        }
        ?>
        <div class="_box-content">
            <div class="row">
                <div class="col-md-12 text-center">
           
                    <div class="_namelgt"><?= Yii::t('app', 'News and events') ?></div>
                    <div class="clearfix margin-bottom-30"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($newOne) {
                        $nameOne = $newOne['name_' . Yii::$app->language];
                        $desOne = $newOne['des_' . Yii::$app->language];
                        $linkOne = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $newOne['slug']);
                        $imgOne = $newOne['image'];
                        ?>
                        <div class="_box-newsOne">
                            <a href="<?= $linkOne; ?>" title="<?= $nameOne; ?>"><img class="lazy" data-original="<?= $imgOne; ?>" src="<?= $imgOne; ?>" alt="<?= $nameOne; ?>" /></a>
                            <div class="_box-nameOne">
                                <div class="_nameOne"><a href="<?= $linkOne; ?>" title="<?= $nameOne; ?>"><?= $nameOne; ?></a></div>
                                <div class="_desOne"><?= Yii::$app->MyComponent->myTruncate($desOne, 180, " ", "..."); ?></div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="clearfix margin-bottom-20"></div>
                    <?php
                    if ($newAll) {
                        ?>
                        <ul class="_scrollvert">
                            <?php
                            foreach ($newAll as $items) :
                                $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items['slug']);
                                $nameN = $items['name_' . Yii::$app->language];
                                $desN = $items['des_' . Yii::$app->language];
                                $imgN = $items['image'];
                                ?>
                                <li class="news-item">
                                    <div class="row margin-bottom-15">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-left-0 padding-right-0">
                                            <div><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><img class="lazy" data-original="<?= $imgN; ?>" width="100%" height="125px" src="<?= $imgN; ?>" alt="<?= $nameN; ?>" /></a></div>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <div class="_nameAll"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= Yii::$app->MyComponent->myTruncate($nameN, 25, " ", "..."); ?></a></div>
                                            <div class="_desAll"><?= Yii::$app->MyComponent->myTruncate($desN, 90, " ", "..."); ?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        
            <div class="clearfix margin-bottom-30"></div>
               <div class="row">
                <div class="col-md-12 text-center">
           
                    <div class="_namelgt"><?= Yii::t('app', 'Outstanding project') ?></div>
                    <div class="clearfix margin-bottom-30"></div>
                </div>
            </div>
            
                    <div class="clearfix margin-bottom-30"></div>
                   <?php
                    if ($duannoibat) {

                        $nameDM = $duannoibat['name_' . Yii::$app->language];
                        $modelCategory = (new Postscat())->getCateChild($duannoibat['id']);
                        if ($modelCategory) {
                            $duanOne = Posts::find()->where('status = 1 and feature = 1 and parent IN (' . implode(',', $modelCategory) . ')')->orderBy('number asc, id desc')->all();
                        } else {
                            $duanOne = Posts::find()->where('status = 1 and feature = 1 and parent = ' . $duannoibat['id'])->orderBy('number asc, id desc')->all();
                        }
                      ?>
                      <div class="_autoplay" style="padding: 0 15px;">
                      <?php
                        if ($duanOne) {
                            foreach ($duanOne as $keyP => $valueP) {
                            $nameOne = $valueP['name_' . Yii::$app->language];
                            $desOne = $valueP['des_' . Yii::$app->language];
                            $linkOne = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $valueP['slug']);
                            $date = date_format(date_create($valueP['created_date']), 'd/m/Y');
                            if ($valueP['image']) {
                                $imgOne = $valueP['image'];
                            } else {
                                $imgOne = '/frontend/web/desktop/images/no-img.jpg';
                            }
                            ?>
    
                                    <div class="hinh_duan">
                                        <a href="<?= $linkOne; ?>" title="<?= $nameOne; ?>"><img src="<?php echo $imgOne ?>" alt="<?= $nameOne ?>" ></a>
                                      <!--   <div class="xemthem_da"><a href="<?//= $linkOne ?>"><?//= Yii::t('app', 'Read more') ?></a></div> -->
                                          <div class="_nameDv"><a href="<?= $linkOne ?>" title="<?= $nameOne; ?>" style="font: 14px 'AvertaStdCY-Bold'; text-align: left;"><span><?= $nameOne; ?></span></a></div>
                                        <div class="_btnab"><a href="<?= $linkOne ?>" title="xem thêm dự án">Xem thêm</a></div>
                                    </div>
        

                        <?php } } ?>
                        </div>
                        <?php
                    } ?>
                 
          
            <?php
        }
        ?>
        
        
      
<div class="clearfix margin-bottom-20"></div>
</div>
<?php $this->registerCss('._foot{margin-top:0;}._slide{margin-bottom:0;}'); ?>
<!-- Modal -->
