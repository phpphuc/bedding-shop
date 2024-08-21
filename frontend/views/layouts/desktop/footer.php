<?php

use backend\models\Gallery;
use backend\models\Postscat;
use backend\models\Posts;
use TonchikTm\Yii2Thumb\ImageThumb;
use kartik\datetime\DateTimePicker;
use backend\models\Chinhanh;
?>
<div class="_foot">
    <div class="pagewrap">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 padding-right-60">
                <div class="_namef"><?= Yii::$app->MyComponent->config['namef_' . Yii::$app->language]; ?></div>
                <div class="_add-foot"><?= Yii::$app->MyComponent->website['address_' . Yii::$app->language]; ?></div>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-left-0 padding-right-30">
                <?php
                $postFooter = Postscat::find()->where(['status' => 1, 'position' => 1])->orderBy('number asc, id desc')->one();
                if ($postFooter) {
                    $modelId = $postFooter['id'];
                    $nameDM = $postFooter['name_' . Yii::$app->language];
                    $model = new Postscat();
                    $modelCategory = $model->getCateChild($modelId);
                    if ($modelCategory) {
                        $news = Posts::find()
                            ->where(['status' => 1, 'feature' => 1, 'parent' => $modelCategory])
                            ->orderBy('number asc, id desc')
                            ->all();
                    } else {
                        $news = Posts::find()
                            ->where(['status' => 1, 'feature' => 1, 'parent' => $modelId])
                            ->orderBy('number asc, id desc')
                            ->all();
                    }
                ?>
                    <div class="_dmfoot"><?= $nameDM; ?></div>
                    <div class="_menuf">
                        <ul>
                            <?php
                            if ($news) {
                                foreach ($news as $items) {
                                    $nameN = $items['name_' . Yii::$app->language];
                                    $linkN = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $items['slug']);
                            ?>
                                    <li><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= $nameN; ?></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 padding-left-30">
                <div class="_tit-mxh"><?= Yii::t('app', 'Connect with us') ?>:</div>
                <div class="_mangxhf">
                    <ul class="list-inline margin-bottom-0">
                        <?php
                        $social = Gallery::find()->where(['type' => 2, 'homepage' => 1])->orderBy('number asc, id desc')->all();
                        if ($social) {
                            foreach ($social as $key => $value) {
                                $name = $value['name_' . Yii::$app->language];
                                $link = $value['link'];
                                $img = $value['image'];
                        ?>
                                <li><a target="_blank" href="<?= $link; ?>"><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $img), 34, 34, ['source' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $name, 'class' => 'lazy']]]); ?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="_bgcpr">
    <div class="pagewrap">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="_copyright"><//?= Yii::$app->MyComponent->config['copyright']; ?></div>
            </div>
        </div>
    </div>
</div>-->
<div class="_datlich-fix">

    <a data-toggle="modal" data-target="#myModal-dh" href="javascript:;" title="Đặt hẹn"><img src="/frontend/web/images/icondl.png" alt="đặt lịch" class="lazy"></a>
</div>
<div class="_hotline-fix">
    <div style="position: relative;">
        <a href="tel:<?= Yii::$app->MyComponent->website['phone']; ?>" title="Hotline"><img src="/frontend/web/images/iconhl.png" alt="đặt lịch" class="lazy"></a>

    </div>
</div>
<div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-credit">
            <a href="https://www.facebook.com/<?= Yii::$app->MyComponent->website['fanpage']; ?>" target="_blank">Facebook Chat Widget</a>
        </div>
        <div class="fb-page" data-href="https://www.facebook.com/<?= Yii::$app->MyComponent->website['fanpage']; ?>" data-tabs="messages" data-width="280" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false">
            <blockquote cite="https://www.facebook.com/<?= Yii::$app->MyComponent->website['fanpage']; ?>" class="fb-xfbml-parse-ignore"> </blockquote>
        </div>
        <div id="fb-root"></div>
    </div>
    <a href="https://m.me/<?= Yii::$app->MyComponent->website['fanpage']; ?>" title="Send us a message on Facebook" class="ctrlq fb-button"></a>
</div>
<div class="chat_zalo">
    <a href="https://zalo.me/<?= Yii::$app->MyComponent->config['phone-zalo']; ?>" target="_blank"><?= \yii\helpers\Html::img('@web/images/zalo.png', ['alt' => 'zalo', 'width' => '52px']); ?></a>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal-dh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" id="frmdh">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= Yii::t('app', 'Sign Up for an Appointment') ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-left-0" style="padding-right: 2.5px;">
                            <div class="form-group">
                                <input type="text" name="namedh" id="namedh" placeholder="<?= Yii::t('app', 'Name') ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="emaildh" id="emaildh" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-right-0" style="padding-left: 2.5px;">
                            <div class="form-group">
                                <input type="number" name="phonedh" id="phonedh" placeholder="<?= Yii::t('app', 'Phone') ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <?=
                                    // DateTimePicker::widget([
                                    //     'name' => 'timedh',
                                    //     'id' => 'timedh',
                                    //     'options' => ['placeholder' => 'Date...'],
                                    //     'pluginOptions' => [
                                    //         'autoclose' => true,
                                    //         'format' => 'dd/mm/yyyy hh:ii'
                                    //     ]
                                    // ]);
                                    'o';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <textarea rows="3" cols="50" class="form-control" name="noidungdh" id="noidungdh" placeholder="<?= Yii::t('app', 'Body') ?>"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default"><?= Yii::t('app', 'Reset') ?></button>
                    <button type="button" name="senddh" id="senddh" class="btn btn-primary"><?= Yii::t('app', 'Send') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>