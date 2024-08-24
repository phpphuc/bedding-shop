<?php

use backend\models\Postscat;
use backend\models\Posts;

?>

<div class="pagewrap">
  <div class="row">
    <?php
    if ($tintucs) {
      $nameDM = $tintucs['name_' . Yii::$app->language];
      $modelCategory = (new Postscat())->getCateChild($tintucs['id']);
      if ($modelCategory) {
        $newOne = Posts::find()->where('status = 1 and feature = 1 and parent IN (' . implode(',', $modelCategory) . ')')->orderBy('number asc, id desc')->one();
        $newAll = Posts::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory) . ')')->offset(1)->orderBy('number asc, id desc')->asArray()->limit(3)->all();
      } else {
        $newOne = Posts::find()->where('status = 1 and feature = 1 and parent = ' . $tintucs['id'])->orderBy('number asc, id desc')->one();
        $newAll = Posts::find()->where('status = 1 and parent = ' . $tintucs['id'])->offset(1)->orderBy('number asc, id desc')->asArray()->limit(3)->all();
      }
    ?>
      <div class="container mx-auto py-8">
        <div class="justify-between gap-8 md:flex">
          <!-- Images Section -->
          <div class="md:w-1/3">
            <div class="mb-4 flex gap-2">
              <h2 class="whitespace-nowrap font-tahoma text-xl font-bold text-primary">HÌNH ẢNH</h2>
              <div class="title-decor"></div>
            </div>
            <div class="grid grid-cols-1 gap-4">
              <img src="../images/hinh-anh1.jpg" alt="Image 1" class="w-full object-cover md:h-[270px] md:w-[392px]" />
              <div class="mx-auto grid grid-cols-3 gap-2">
                <img src="../images/hinh-anh2.jpg" alt="Image 2" class="h-[93px] w-[124px] object-cover sm:w-full" />
                <img src="../images/hinh-anh3.jpg" alt="Image 3" class="h-[93px] w-[124px] object-cover sm:w-full" />
                <img src="../images/hinh-anh4.jpg" alt="Image 4" class="h-[93px] w-[124px] object-cover sm:w-full" />
              </div>
            </div>
          </div>

          <!-- News Section -->
          <div class="md:w-2/3">
            <div class="mb-4 flex gap-2">
              <h2 class="whitespace-nowrap font-tahoma text-xl font-bold text-primary"><?= Yii::t('app', 'News and events') ?>TIN TỨC NỔI BẬT</h2>
              <div class="title-decor"></div>
            </div>
            <div class="gap-6 lg:flex">
              <!-- <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 padding-left-0">
                                        <div class="tieude_sp"><span></span></div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> -->
              <?php
              if ($newOne) {
                $nameOne = $newOne['name_' . Yii::$app->language];
                $desOne = $newOne['des_' . Yii::$app->language];
                $linkOne = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $newOne['slug']);
                $date = date_format(date_create($newOne['created_date']), 'd/m/Y');
                if ($newOne['image']) {
                  $imgOne = $newOne['image'];
                } else {
                  $imgOne = '/frontend/web/desktop/images/no-img.jpg';
                }
              ?>
                <div class="mb-4">
                  <img src="<?= $imgOne ?>" alt="Image 5" class="mb-2 w-full object-cover" />
                  <h3 class="text-lg font-semibold"><a href="<?= $linkOne; ?>" title="<?= $nameOne; ?>"><?= $nameOne; ?></a></h3>
                  <p>
                    <?= Yii::$app->MyComponent->myTruncate($desOne, 210, " ", "..."); ?>
                  </p>
                  <div class="mt-4">
                    <a href="<?= $linkOne ?>" class="border-2 border-[#333] bg-white px-4 py-3 font-bold text-[#333]">XEM THÊM</a>
                  </div>
                </div><?php
                      /*
                                ?>
                                    <div class="hover14">
                                        <a href="<?= $linkOne; ?>" title="<?= $nameOne; ?>">
                                            <figure><?= Html::img(Yii::$app->thumbnailer->get($imgOne, 375, 200, 50, ImageThumb::THUMBNAIL_INSET), ['alt' => $nameOne, 'class' => 'lazy', 'data-original' => Yii::$app->thumbnailer->get($imgOne, 375, 200, 50, ImageThumb::THUMBNAIL_INSET)]); ?></figure>
                                        </a>
                                    </div>
                                    <div class="_nameOne"><a href="<?= $linkOne; ?>" title="<?= $nameOne; ?>"><?= $nameOne; ?></a></div>
                                    <div class="datenew"><?= $date ?></div>
                                    <div class="_desOne"><?= Yii::$app->MyComponent->myTruncate($desOne, 210, " ", "..."); ?></div>

                                <?php
                                */
                    }
                      ?>

              <?php ?>
              <!-- </div> -->
              <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-left-0"> -->
              <?php
              if ($newAll) {
              ?>
                <div class="space-y-4 -translate-y-2">
                  <!-- <ul class="_scrollvert"> -->
                  <?php
                  foreach ($newAll as $items) :
                    $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items['slug']);
                    $nameN = $items['name_' . Yii::$app->language];
                    $desN = $items['des_' . Yii::$app->language];
                    $imgN = $items['image'];
                  ?>
                    <div class="flex">
                      <a class="block w-1/3 mr-4" href="<?= $linkN ?>"><img src="<?= $imgN ?>" alt="Image 6" class="w-full translate-y-2 object-cover" /></a>
                      <div class="w-2/3">
                        <a class="w-2/3" href="<?= $linkN ?>" title="<?= $nameN; ?>">
                          <h3 class="text-lg font-semibold"><?= $nameN ?></h3>
                        </a>
                        <p class="text-justify">
                          <?= Yii::$app->MyComponent->myTruncate($desN, 100, " ", "..."); ?>
                        </p>
                      </div>
                      <!-- </div> -->
                    </div>
                    <?php /*?>
                                                <li class="news-item">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 padding-left-0 padding-right-0">
                                                            <div class="hover15"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>">
                                                                    <figure><?= Html::img(Yii::$app->thumbnailer->get($imgN, 130, 115, 50, ImageThumb::THUMBNAIL_INSET), ['alt' => $nameN, 'class' => 'lazy', 'data-original' => Yii::$app->thumbnailer->get($imgN, 130, 115, 50, ImageThumb::THUMBNAIL_INSET)]); ?></figure>
                                                                </a></div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 padding-left-10">
                                                            <div class="_nameAll"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= $nameN; ?></a></div>
                                                            <div class="_desAll"><?= Yii::$app->MyComponent->myTruncate($desN, 100, " ", "..."); ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-bottom-20"></div>
                                                </li>
                                                <?php */ ?>
                  <?php
                  endforeach;
                  ?>
                  <!-- </ul> -->
                </div>
              <?php
              }
              ?>
              <!-- </div> -->
              <!-- </div> -->
              <!-- </div> -->
            </div>
          </div>
        </div>
        <!-- </div> -->
      <?php
    }
      ?>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 padding-left-0">


        <?php
        if (!$duannoibat) {

          $nameDM = $duannoibat['name_' . Yii::$app->language];
          $modelCategory = (new Postscat())->getCateChild($duannoibat['id']);
          if ($modelCategory) {
            $duanOne = Posts::find()->where('status = 1 and feature = 1 and parent IN (' . implode(',', $modelCategory) . ')')->orderBy('number asc, id desc')->all();
          } else {
            $duanOne = Posts::find()->where('status = 1 and feature = 1 and parent = ' . $duannoibat['id'])->orderBy('number asc, id desc')->all();
          }
        ?>
          <div class="tieude_duan"><span><?= Yii::t('app', 'Outstanding project') ?></span></div>
          <div class="owl-carousel owl-theme owl-carousel1-brands">
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


                <div class="hinh_duan>
                                    st
                                        <a href=" <?= $linkOne; ?>" title="<?= $nameOne; ?>"> <?= Html::img(Yii::$app->thumbnailer->get($imgOne, 380, 280, 50, ImageThumb::THUMBNAIL_INSET), ['alt' => $nameOne, 'class' => 'lazy', 'data-original' => Yii::$app->thumbnailer->get($imgOne, 380, 280, 50, ImageThumb::THUMBNAIL_INSET)]); ?></a>
                  <!--     <div class="xemthem_da"><a href="<?= $linkOne ?>"><//?= Yii::t('app', 'Read more') ?></a></div> -->


                  <div class="_nameDv"><a href="<?= $linkOne ?>" title="<?= $nameOne; ?>" style="font: 14px 'AvertaStdCY-Bold';"><span><?= $nameOne; ?></span></a></div>
                  <div class="_btnab"><a href="<?= $linkOne ?>" title="xem thêm dự án">Xem thêm</a></div>

                </div>


            <?php }
            } ?>
          </div>
        <?php
        } ?>
      </div>
      </div>
  </div>


</div>