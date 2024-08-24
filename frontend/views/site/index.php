<?php

use yii\helpers\Html;
use backend\models\Postscat;
use backend\models\Posts;
use TonchikTm\Yii2Thumb\ImageThumb;
use kartik\datetime\DateTimePicker;
use backend\models\Videos;
use backend\models\Gallery;

/* @var $this yii\web\View */

$this->title = Yii::$app->MyComponent->website['title'];
// echo Posts::tableName();
// echo \backend\models\PageSearch::tableName();
// echo \backend\models\ResetPasswordForm::className();
// echo \backend\models\AuthAssignment::tableName();
?>
<?php //include 'slider.php';
?>
<?php include 'swiper.php';
?>
<div class="site-index">
    <?php
    if ($pageOne) {
        $linkAb = Yii::$app->urlManager->createUrl('/bai-viet/' . $pageOne['slug']);
        $nameAb = $pageOne['name_' . Yii::$app->language];
        $desAb = $pageOne['des_' . Yii::$app->language];
        $imgAb = $pageOne['image'];
    ?>
        <section class="intro-background bg-light py-8">
            <div class="container mx-auto">
                <div class="items-center justify-between md:flex">
                    <div class="md:w-1/2">
                        <!-- <img src="images/about-slide.png" alt="Introduction Image" class="w-full rounded-lg" /> -->
                        <?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgAb), 560, 432, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameAb, 'class' => 'lazy']]]); ?>
                    </div>
                    <div class="px-4 md:ml-8 md:w-1/2">
                        <div class="text-center">
                            <h2 class="font-utm-avo text-3xl font-bold text-pink-500"><?= $nameAb ?></h2>
                            <div class="decoration my-2">
                                <img src="../images/intro-decoration.png" alt="Decoration" class="mx-auto" />
                            </div>
                        </div>
                        <div style="font-family: 'Roboto', sans-serif;" class="text-justify !font-roboto text-lg leading-relaxed text-gray-700"><?= $desAb ?></div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <div class="_loigiatri">
        <div class="pagewrap">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="_namelgt"><?= Yii::t('app', 'Core Value') ?></div>
                    <div class="clearfix margin-bottom-50"></div>
                    <div style="padding: 0 50px;">
                        <div class="row">
                            <?php
                            if (!$visaos) {
                                foreach ($visaos as $key => $value) {
                                    $nameVs = $value['name_' . Yii::$app->language];
                                    $imgVs = $value['image'];
                            ?>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-right-40">
                                        <?= $key ?>
                                        <div><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgVs), 126, 126, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_INSET], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $nameVs, 'class' => 'lazy']]]); ?></div>
                                        <div class="_nameVs"><?= $nameVs; ?></div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!$dichvus) {
        $nameDM = $dichvus['name_' . Yii::$app->language];
        $desDM = $dichvus['des_' . Yii::$app->language];
        $modelCategory = (new Postscat())->getCateChild($dichvus['id']);
        if ($modelCategory) {
            $newAll = Posts::find()->where(['status' => 1, 'feature' => 1, 'parent' => $modelCategory])->orderBy('number asc, id desc')->limit(4)->asArray()->all();
        } else {
            $newAll = Posts::find()->where(['status' => 1, 'feature' => 1, 'parent' => $dichvus['id']])->orderBy('number asc, id desc')->limit(4)->asArray()->all();
        }
    ?>

        <div class="_dichvus" style="background: url('<?= Yii::$app->MyComponent->config['bgdv']; ?>') no-repeat; background-size: 100% 100%;">
            <div class="pagewrap">

                <div class="row" style="border-top: 5px #fe382d solid;">
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
                    $stt = 1;
                    foreach ($newAll as $items) {
                        $stt++;
                        $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items['slug']);
                        $nameN = $items['name_' . Yii::$app->language];
                        $imgN = $items['image'];
                        $noidungN = $items['des_' . Yii::$app->language];
                        if ($stt % 2 == 0) {
                ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="_hinhdv">
                                        <div class="hover14 _imgDv"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgN), 590, 356, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameN, 'class' => 'lazy']]]); ?></a></div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="_boxdv">
                                        <div class="_nameDv"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><span><?= $nameN; ?></span></a></div>
                                        <div class="noidungdv"><?= $noidungN; ?></div>
                                        <div class="_btnab"><a href="<?= $linkN; ?>" title="Giới thiệu"><?= Yii::t('app', 'Read more') ?></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix margin-bottom-30"></div>
                        <?php } else {
                        ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="_boxdv1">
                                        <div class="_nameDv"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><span><?= $nameN; ?></span></a></div>
                                        <div class="noidungdv"><?= $noidungN; ?></div>
                                        <div class="_btnab"><a href="<?= $linkN; ?>" title="Giới thiệu"><?= Yii::t('app', 'Read more') ?></a></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="_hinhdv">
                                        <div class="hover14 _imgDv"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgN), 590, 356, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $nameN, 'class' => 'lazy']]]); ?></a></div>

                                    </div>
                                </div>

                            </div>
                            <div class="clearfix margin-bottom-30"></div>
                <?php
                        }
                    }
                }
                ?>

            </div>
        </div>

        <div class="_doitac">
            <div class="khungdoitac">
                <div class="name_khachhang"><span><?= Yii::t('app', 'Our customer') ?></span></div>
                <div class="row">


                    <?php
                    $doitac = Gallery::find()->where(['type' => 1, 'homepage' => 1])->orderBy('number asc, id desc')->all();
                    if ($doitac) {
                        foreach ($doitac as $keyV => $valueV) {
                            $name = $valueV['name_' . Yii::$app->language];
                            $link = $valueV['link'];
                            $img = $valueV['image'];
                    ?>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center" style="width: 20%">
                                <div class="_itemdoitac">
                                    <a target="_blank" href="<?= $link; ?>" title="<?= $name; ?>">
                                        <?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $img), 230, 115, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $name, 'class' => 'lazy']]]); ?>
                                    </a>
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
    }
    if (!$bacsi) {
    ?>
        <div class="_bgbacsi" style="background: url('<?= Yii::$app->MyComponent->config['bgdn']; ?>') no-repeat; background-size: 100% 100%;">
            <div class="pagewrap">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="_box-title-bs">

                            <div class="_box-title">
                                <div class="_title-bs"><?= Yii::$app->MyComponent->config['title-dn_' . Yii::$app->language]; ?></div>
                                <div class="_des-bs"><?= Yii::$app->MyComponent->config['des-dn_' . Yii::$app->language]; ?></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div style="padding: 0 100px;">
                            <div class="row">
                                <?php
                                foreach ($bacsi as $key => $value) {
                                    $namebs = $value['name_' . Yii::$app->language];
                                    $desbs = $value['des_' . Yii::$app->language];
                                    $imgbs = $value['image'];
                                ?>
                                    <div class="col-md-4 text-center">
                                        <div class="_imgbs"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $imgbs), 435, 600, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_OUTBOUND], 'img' => ['mode' => ImageThumb::THUMBNAIL_OUTBOUND, 'quality' => 80, 'attributes' => ['alt' => $namebs, 'class' => 'lazy']]]); ?></div>
                                        <div class="_name-bs"><?= $namebs; ?></div>
                                        <div class="_chuyenkhoa"><?= $desbs; ?></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!--                        <div class="clearfix margin-bottom-40"></div>
                                                <div class="_btn-dhbs"><button data-toggle="modal" data-target="#myModal-dhbs"><? //= Yii::t('app', 'Make an appointment with your doctor')
                                                                                                                                ?></button></div>-->
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
    <?php /*
      <div class="_bgdathen">
      <div class="pagewrap">
      <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="_box-wt">
      <div class="title_time"><?= Yii::t('app', 'WORK TIME') ?></div>
      <div><?= Yii::$app->MyComponent->config['work-time_' . Yii::$app->language]; ?></div>
      </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="_box-dh">
      <div class="_titledk"><?= Yii::t('app', 'Sign Up for an Appointment') ?></div>
      <div class="_desdk"><?= Yii::$app->MyComponent->config['desdk_' . Yii::$app->language]; ?></div>
      <form role="form" id="frmdknt">
      <div class="form-group">
      <input type="text" name="namedk" id="namedk" placeholder="<?= Yii::t('app', 'Name') ?>" class="form-control">
      </div>
      <div class="form-group">
      <input type="number" name="phonedk" id="phonedk" placeholder="<?= Yii::t('app', 'Phone') ?>" class="form-control">
      </div>
      <div class="form-group">
      <input type="email" name="emaildk" id="emaildk" placeholder="<?= Yii::t('app', 'Email') ?>" class="form-control">
      </div>
      <div class="form-group">
      <select name="chinhanhdk" id="chinhanhdk" class="form-control">
      <option value=""><?= Yii::t('app', 'Select Clinic Branch') ?>...</option>
      <?php
      if ($chinhanh) {
      foreach ($chinhanh as $key => $value) {
      $namecn = $value['name_' . Yii::$app->language];
      ?>
      <option value="<?= $namecn; ?>"><?= $namecn; ?></option>
      <?php
      }
      }
      ?>
      </select>
      </div>
      <div class="form-group">
      <?=
      DateTimePicker::widget([
      'name' => 'timedk',
      'id' => 'timedk',
      'options' => ['placeholder' => 'date...'],
      'pluginOptions' => [
      'autoclose' => true,
      'format' => 'dd/mm/yyyy hh:ii'
      ]
      ]);
      ?>
      </div>
      <div class="form-group">
      <textarea rows="4" cols="50" class="form-control" name="noidungdk" id="noidungdk" placeholder="<?= Yii::t('app', 'Body') ?>"></textarea>
      </div>
      <div class="text-center">
      <button type="button" name="senddk" id="senddk"><?= Yii::t('app', 'Send') ?></button>
      </div>
      </form>
      </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="_box-tv">
      <div class="title_time"><?= Yii::t('app', 'SUPPORT - CONSULTANCY') ?></div>
      <div><?= Yii::$app->MyComponent->config['tuvan_' . Yii::$app->language]; ?></div>
      </div>
      </div>
      </div>
      </div>
      </div>
     */ ?>

    <div class="_bgtt">


        <?= $this->render('_img_and_news', ['tintucs' => $tintucs]); ?>

    </div>

    <?php $this->registerCss('._foot{margin-top:0;}._slide{margin-bottom:0;}'); ?>

    <!-- Modal  -->
    <?php /*
  <div class="modal fade" id="myModal-dhbs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <form role="form" id="frmdhbs">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title" id="myModalLabel"><?= Yii::t('app', 'BOOK AN APPOINTMENT WITH A DOCTOR') ?></h4>
  </div>
  <div class="modal-body">
  <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-left-0" style="padding-right: 2.5px;">
  <div class="form-group">
  <input type="text" name="namedhbs" id="namedhbs" placeholder="<?= Yii::t('app', 'Name') ?>" class="form-control">
  </div>
  <div class="form-group">
  <input type="email" name="emaildhbs" id="emaildhbs" placeholder="Email" class="form-control">
  </div>
  <div class="form-group">
  <select name="bacsidh" id="bacsidh" class="form-control">
  <option value=""><?= Yii::t('app', 'Name') ?><?= Yii::t('app', 'Choose a doctor') ?>...</option>
  <?php
  if ($bacsi) {
  foreach ($bacsi as $key => $value) {
  $namebs = $value['name_' . Yii::$app->language];
  ?>
  <option value="<?= $namebs; ?>"><?= $namebs; ?></option>
  <?php
  }
  }
  ?>
  </select>
  </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-right-0" style="padding-left: 2.5px;">
  <div class="form-group">
  <input type="number" name="phonedhbs" id="phonedhbs" placeholder="<?= Yii::t('app', 'Phone') ?>" class="form-control">
  </div>
  <div class="form-group">
  <select name="chinhanhdh" id="chinhanhdh" class="form-control">
  <option value=""><?= Yii::t('app', 'Select Clinic Branch') ?>...</option>
  <?php
  if ($chinhanh) {
  foreach ($chinhanh as $key => $value) {
  $namecn = $value['name_' . Yii::$app->language];
  ?>
  <option value="<?= $namecn; ?>"><?= $namecn; ?></option>
  <?php
  }
  }
  ?>
  </select>
  </div>
  <div class="form-group">
  <?=
  DateTimePicker::widget([
  'name' => 'timedhbs',
  'id' => 'timedhbs',
  'options' => ['placeholder' => 'Date...'],
  'pluginOptions' => [
  'autoclose' => true,
  'format' => 'dd/mm/yyyy hh:ii'
  ]
  ]);
  ?>
  </div>
  </div>
  </div>
  <div class="form-group">
  <textarea rows="3" cols="50" class="form-control" name="noidungdhbs" id="noidungdhbs" placeholder="<?= Yii::t('app', 'Body') ?>"></textarea>
  </div>
  </div>
  <div class="modal-footer">
  <button type="reset" class="btn btn-default"><?= Yii::t('app', 'Reset') ?></button>
  <button type="button" name="senddhbs" id="senddhbs" class="btn btn-primary"><?= Yii::t('app', 'Send') ?></button>
  </div>
  </form>
  </div>
  </div>
  </div>
 *
 */ ?>