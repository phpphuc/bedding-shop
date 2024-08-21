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
            <div class="col-md-12">
                <div class="_namef"><?= Yii::$app->MyComponent->config['namef_'. Yii::$app->language]; ?></div>
                <div class="_add-foot">

<div class="btgrid">
  <div class="row row-1">
    <div class="col col-md-2" style="width: 30%; float: left;">
      <div class="content">
        <ul>
          <li>SĐT</li>
        </ul>
      </div>
    </div>
    <div class="col col-md-10" style="width: 70%; float: left;">
      <div class="content">
        <p>: <?= Yii::$app->MyComponent->config['phone_footer']; ?>
        </p>
      </div>
    </div>
  </div>
  <div class="row row-2">
    <div class="col col-md-2" style="width: 30%; float: left;">
      <div class="content">
        <ul>
          <li><span style="width: 90px;display: inline-block;">Website</span></li>
        </ul>
      </div>
    </div>
    <div class="col col-md-10" style="width: 70%; float: left;">
      <div class="content">
        <p>: <?= Yii::$app->MyComponent->website['website']; ?>
        </p>
      </div>
    </div>
  </div>
  <div class="row row-3">
    <div class="col col-md-2" style="width: 30%; float: left;">
      <div class="content">
        <ul>
          <li><span style="width: 90px;display: inline-block;"><span style="width: 90px;display: inline-block;">Địa chỉ</span></span></li>
        </ul>
      </div>
    </div>
    <div class="col col-md-10" style="width: 70%; float: left;">
      <div class="content">
        <p>: <?= Yii::$app->MyComponent->config['diachi_footer']; ?>
        </p>
      </div>
    </div>
  </div>
  <div class="row row-4">
    <div class="col col-md-2" style="width: 30%; float: left;">
      <div class="content">
        <ul>
          <li><span style="width: 90px;display: inline-block;"><span style="width: 90px;display: inline-block;">VPKD</span></span></li>
        </ul>
      </div>
    </div>
    <div class="col col-md-10" style="width: 70%; float: left;">
      <div class="content">
        <p>: <?= Yii::$app->MyComponent->config['vpkd_footer']; ?>
        </p>
      </div>
    </div>
  </div>
</div>



                </div>
                <div class="_tit-mxh">Kết nối với chúng tôi:</div>
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
            <div class="clearfix margin-bottom-20"></div>
            <div class="col-md-12">
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
            <div class="clearfix margin-bottom-20"></div>
<!--            <div class="col-md-12">
                <div class="_dmfoot">Fanpage Facebook</div>
                <div class="fb-page" data-href="https://www.facebook.com/<//?= Yii::$app->MyComponent->website['fanpage']; ?>" data-tabs="timeline" data-width="1000" data-height="220" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/<?= Yii::$app->MyComponent->website['fanpage']; ?>" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/<?= Yii::$app->MyComponent->website['fanpage']; ?>">Fanpage Facebook</a></blockquote></div>
            </div>-->
        </div>
    </div>
</div>
<div class="_bgcpr">
    <div class="pagewrap">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="_copyright"><?= Yii::$app->MyComponent->config['copyright']; ?></div>
            </div>
        </div>
    </div>
</div>
<div class="chat_zalo">
    <a href="https://zalo.me/<?= Yii::$app->MyComponent->config['phone-zalo']; ?>" target="_blank"><?= \yii\helpers\Html::img('@web/images/zalo.png', ['alt' => 'zalo', 'width' => '50px']); ?></a>
</div>
<div class="fb-livechat" style="display: block;"> 
    <a href="https://m.me/<?= Yii::$app->MyComponent->website['fanpage']; ?>" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button"></a>
</div>
<div class="hotline">
    <div id="phonering-alo-phoneIcon" class="phonering-alo-phone phonering-alo-green phonering-alo-show">
        <div class="phonering-alo-ph-circle"></div>
        <div class="phonering-alo-ph-circle-fill"></div>
        <div class="phonering-alo-ph-img-circle">
            <a class="pps-btn-img " title="Liên hệ" href="tel:<?= Yii::$app->MyComponent->website['phone']; ?>"> <img src="https://3.bp.blogspot.com/-jipOkVbgvtk/WPd_CdNwOoI/AAAAAAAAEn0/iYoBqhrSHWgSGDOiEvvEzTYa-khhJt9NACLcB/s1600/v8TniL3.png" alt="Liên hệ" class="img-responsive"/> </a>
        </div>
    </div>
</div> 
<style>
.pps-btn-img  img {width: 30px}
    .fb-livechat, .fb-widget{display: none}
    .ctrlq.fb-button, .ctrlq.fb-close{position: fixed; right: 5px; cursor: pointer}
    .ctrlq.fb-button{z-index: 999; background: url('../images/messenger.png') center no-repeat; width: 50px; height: 50px; overflow: visible; text-align: center; bottom: 25px; border: 0;outline: 0;transition: all .2s ease-in-out}
    .ctrlq.fb-button:focus, .ctrlq.fb-button:hover{transform: scale(1.1);}
    .fb-widget{background: #fff; z-index: 1000; position: fixed; width: 360px; height: 435px; overflow: hidden; opacity: 0; bottom: 0; right: 24px; box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)}
    .fb-credit{text-align: center; margin-top: 8px}
    .fb-credit a{transition: none; color: #bec2c9; font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-decoration: none; border: 0; font-weight: 400}
    .ctrlq.fb-overlay{z-index: 0; position: fixed; height: 100vh; width: 100vw; -webkit-transition: opacity .4s, visibility .4s; transition: opacity .4s, visibility .4s; top: 0; left: 0; background: rgba(0, 0, 0, .05); display: none}
    .ctrlq.fb-close{z-index: 4; padding: 0 6px; background: #365899; font-weight: 700; font-size: 11px; color: #fff; margin: 8px; }
    .ctrlq.fb-close::after{content: "X"; font-family: sans-serif}
    .bubble{width: 20px; height: 20px; background: #c00; color: #fff; position: absolute; z-index: 999999999; text-align: center; vertical-align: middle; top: -2px; left: -5px;}
    .chat_zalo{
        position: fixed;
        bottom: 80px;
        right: 5px;
        z-index: 9999; 
    }

    /* HOTLINE */
    .phonering-alo-phone {position:fixed;visibility:hidden;background-color:transparent;width:10px;height:150px;
                          cursor:pointer;z-index:9999!important;bottom:140px;right:115px;display:block;
                          -webkit-backface-visibility:hidden;
                          -webkit-transform:translateZ(0);
                          transition:visibility .5s;
                          margin: 0;
    }
    .phonering-alo-phone.phonering-alo-show {visibility:visible}
    .phonering-alo-phone.phonering-alo-static {opacity:.6}
    .phonering-alo-phone.phonering-alo-hover,.phonering-alo-phone:hover {opacity:1}
    .phonering-alo-ph-circle {width:130px;height:130px;top:30px;left:30px;position:absolute;
                              background-color:transparent;border-radius:100%;border:2px solid rgba(30,30,30,0.4);
                              opacity:.1;
                              -webkit-animation:phonering-alo-circle-anim 1.2s infinite ease-in-out;
                              animation:phonering-alo-circle-anim 1.2s infinite ease-in-out;
                              transition:all .5s;
                              -webkit-transform-origin:50% 50%;
                              -ms-transform-origin:50% 50%;
                              transform-origin:50% 50%
    }
    .phonering-alo-phone.phonering-alo-active .phonering-alo-ph-circle {
        -webkit-animation:phonering-alo-circle-anim 1.1s infinite ease-in-out!important;
        animation:phonering-alo-circle-anim 1.1s infinite ease-in-out!important
    }
    .phonering-alo-phone.phonering-alo-static .phonering-alo-ph-circle {
        -webkit-animation:phonering-alo-circle-anim 2.2s infinite ease-in-out!important;
        animation:phonering-alo-circle-anim 2.2s infinite ease-in-out!important
    }
    .phonering-alo-phone.phonering-alo-hover .phonering-alo-ph-circle,.phonering-alo-phone:hover .phonering-alo-ph-circle {
        border-color: red;
        opacity:.5
    }
    .phonering-alo-phone.phonering-alo-green.phonering-alo-hover .phonering-alo-ph-circle,.phonering-alo-phone.phonering-alo-green:hover .phonering-alo-ph-circle {
        border-color:#272d6b;
        opacity:.5
    }
    .phonering-alo-phone.phonering-alo-green .phonering-alo-ph-circle {
        border-color: red;
        opacity:.5
    }
    .phonering-alo-phone.phonering-alo-gray.phonering-alo-hover .phonering-alo-ph-circle,.phonering-alo-phone.phonering-alo-gray:hover .phonering-alo-ph-circle {
        border-color:#ccc;
        opacity:.5
    }
    .phonering-alo-phone.phonering-alo-gray .phonering-alo-ph-circle {
        border-color:#75eb50;
        opacity:.5
    }
    .phonering-alo-ph-circle-fill {width:100px;height:100px;top:45px;left:45px;position:absolute;background-color:#000;
                                   border-radius:100%;border:2px solid transparent;
                                   -webkit-animation:phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
                                   animation:phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
                                   transition:all .5s;
                                   -webkit-transform-origin:50% 50%;
                                   -ms-transform-origin:50% 50%;
                                   transform-origin:50% 50%
    }
    .phonering-alo-phone.phonering-alo-active .phonering-alo-ph-circle-fill {
        -webkit-animation:phonering-alo-circle-fill-anim 1.7s infinite ease-in-out!important;
        animation:phonering-alo-circle-fill-anim 1.7s infinite ease-in-out!important
    }
    .phonering-alo-phone.phonering-alo-static .phonering-alo-ph-circle-fill {
        -webkit-animation:phonering-alo-circle-fill-anim 2.3s infinite ease-in-out!important;
        animation:phonering-alo-circle-fill-anim 2.3s infinite ease-in-out!important;
        opacity:0!important
    }
    .phonering-alo-phone.phonering-alo-hover .phonering-alo-ph-circle-fill,.phonering-alo-phone:hover .phonering-alo-ph-circle-fill {
        background-color:rgba(39,45,107,0.5);
        opacity:.75!important
    }
    .phonering-alo-phone.phonering-alo-green.phonering-alo-hover .phonering-alo-ph-circle-fill,.phonering-alo-phone.phonering-alo-green:hover .phonering-alo-ph-circle-fill {
        background-color:rgba(39,45,107,0.5);
        opacity:.75!important
    }
    .phonering-alo-phone.phonering-alo-green .phonering-alo-ph-circle-fill {
        background-color:rgba(242, 20, 0, 0.56);
    }
    .phonering-alo-phone.phonering-alo-gray.phonering-alo-hover .phonering-alo-ph-circle-fill,.phonering-alo-phone.phonering-alo-gray:hover .phonering-alo-ph-circle-fill {
        background-color:rgba(204,204,204,0.5);
        opacity:.75!important
    }
    .phonering-alo-phone.phonering-alo-gray .phonering-alo-ph-circle-fill {
        background-color:rgba(117,235,80,0.5);
        opacity:.75!important
    }
    .phonering-alo-ph-img-circle {
        width:40px;
        height:40px;
        top:75px;
        left:75px;
        position:absolute;
        background:rgba(30,30,30,0.1) url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABNmlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjarY6xSsNQFEDPi6LiUCsEcXB4kygotupgxqQtRRCs1SHJ1qShSmkSXl7VfoSjWwcXd7/AyVFwUPwC/0Bx6uAQIYODCJ7p3MPlcsGo2HWnYZRhEGvVbjrS9Xw5+8QMUwDQCbPUbrUOAOIkjvjB5ysC4HnTrjsN/sZ8mCoNTIDtbpSFICpA/0KnGsQYMIN+qkHcAaY6addAPAClXu4vQCnI/Q0oKdfzQXwAZs/1fDDmADPIfQUwdXSpAWpJOlJnvVMtq5ZlSbubBJE8HmU6GmRyPw4TlSaqo6MukP8HwGK+2G46cq1qWXvr/DOu58vc3o8QgFh6LFpBOFTn3yqMnd/n4sZ4GQ5vYXpStN0ruNmAheuirVahvAX34y/Axk/96FpPYgAAACBjSFJNAAB6JQAAgIMAAPn/AACA6AAAUggAARVYAAA6lwAAF2/XWh+QAAAB/ElEQVR42uya7W3CMBCG31QM4A1aNggTlG6QbpBMkHYC1AloJ4BOABuEDcgGtBOETnD9c1ERCH/lwxeaV8oPFGP86Hy+DxMREW5Bd7gRjSDSNGn4/RiAOvm8C0ZCRD5PSkQVXSr1nK/xE3mcWimA1ZV3JYBZCIO4giQANoYxMwYS6+xKY4lT5dJPreWZY+uspqSCKPYN27GJVBDXheVSQe494ksiEWTuMXcu1dld9SARxDX1OAJ4lgjy4zDnFsC076A4adEiRwAZg4hOUSpNoCsBPDGM+HqkNGynYBCuILuWj+dgWysGsNe8nwL4GsrW0m2fxZBq9rW0rNcX5MOQ9eZD8JFahcG5g/iKT671alGAYQggpYWvpEPYWrU/HDTOfeRIX0q2SL3QN4tGhZJukVobQyXYWw7WtLDKDIuM+ZSzscyCE9PCy5IttCvnZNaeiGLNHKuz8ZVh/MXTVu/1xQKmIqLEAuJ0fNo3iG5B51oSkeKnsBi/4bG9gYB/lCytU5G9DryFW+3Gm+JLwU7ehbJrwTjq4DJU8bHcVbEV9dXXqqP6uqO5e2/QZRYJpqu2IUAA4B3tXvx8hgKp05QZW6dJqrLTNkB6vrRURLRwPHqtYgkC3cLWQAcDQGGKH13FER/NATzi786+BPDNjm1dMkfjn2pGkBHkf4D8DgBJDuDHx9BN+gAAAABJRU5ErkJggg==) no-repeat center center;
        border-radius:100%;
        border:2px solid transparent;
        -webkit-animation:phonering-alo-circle-img-anim 1s infinite ease-in-out;
        animation:phonering-alo-circle-img-anim 1s infinite ease-in-out;
        -webkit-transform-origin:50% 50%;
        -ms-transform-origin:50% 50%;
        transform-origin:50% 50%;
            background-size: 28px;
    }

    .phonering-alo-phone.phonering-alo-active .phonering-alo-ph-img-circle {
        -webkit-animation:phonering-alo-circle-img-anim 1s infinite ease-in-out!important;
        animation:phonering-alo-circle-img-anim 1s infinite ease-in-out!important
    }

    .phonering-alo-phone.phonering-alo-static .phonering-alo-ph-img-circle {
        -webkit-animation:phonering-alo-circle-img-anim 0 infinite ease-in-out!important;
        animation:phonering-alo-circle-img-anim 0 infinite ease-in-out!important
    }

    .phonering-alo-phone.phonering-alo-hover .phonering-alo-ph-img-circle,.phonering-alo-phone:hover .phonering-alo-ph-img-circle {
        background-color:#00aff2;
    }

    .phonering-alo-phone.phonering-alo-green.phonering-alo-hover .phonering-alo-ph-img-circle,.phonering-alo-phone.phonering-alo-green:hover .phonering-alo-ph-img-circle {
        background-color:#272d6b;
    }

    .phonering-alo-phone.phonering-alo-green .phonering-alo-ph-img-circle {
        background-color:red;
    }

    .phonering-alo-phone.phonering-alo-gray.phonering-alo-hover .phonering-alo-ph-img-circle,.phonering-alo-phone.phonering-alo-gray:hover .phonering-alo-ph-img-circle {
        background-color:#ccc;
    }

    .phonering-alo-phone.phonering-alo-gray .phonering-alo-ph-img-circle {
        background-color:#75eb50
    }

    @-webkit-keyframes phonering-alo-circle-anim {
        0% {
            -webkit-transform:rotate(0) scale(.5) skew(1deg);
            -webkit-opacity:.1
        }

        30% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            -webkit-opacity:.5
        }

        100% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            -webkit-opacity:.1
        }
    }

    @-webkit-keyframes phonering-alo-circle-fill-anim {
        0% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            opacity:.2
        }

        50% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            opacity:.2
        }

        100% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            opacity:.2
        }
    }

    @-webkit-keyframes phonering-alo-circle-img-anim {
        0% {
            -webkit-transform:rotate(0) scale(1) skew(1deg)
        }

        10% {
            -webkit-transform:rotate(-25deg) scale(1) skew(1deg)
        }

        20% {
            -webkit-transform:rotate(25deg) scale(1) skew(1deg)
        }

        30% {
            -webkit-transform:rotate(-25deg) scale(1) skew(1deg)
        }

        40% {
            -webkit-transform:rotate(25deg) scale(1) skew(1deg)
        }

        50% {
            -webkit-transform:rotate(0) scale(1) skew(1deg)
        }

        100% {
            -webkit-transform:rotate(0) scale(1) skew(1deg)
        }
    }

    @-webkit-keyframes phonering-alo-circle-anim {
        0% {
            -webkit-transform:rotate(0) scale(.5) skew(1deg);
            transform:rotate(0) scale(.5) skew(1deg);
            opacity:.1
        }

        30% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            transform:rotate(0) scale(.7) skew(1deg);
            opacity:.5
        }

        100% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg);
            opacity:.1
        }
    }

    @keyframes phonering-alo-circle-anim {
        0% {
            -webkit-transform:rotate(0) scale(.5) skew(1deg);
            transform:rotate(0) scale(.5) skew(1deg);
            opacity:.1
        }

        30% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            transform:rotate(0) scale(.7) skew(1deg);
            opacity:.5
        }

        100% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg);
            opacity:.1
        }
    }

    @-webkit-keyframes phonering-alo-circle-fill-anim {
        0% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            transform:rotate(0) scale(.7) skew(1deg);
            opacity:.2
        }

        50% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg);
            opacity:.2
        }

        100% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            transform:rotate(0) scale(.7) skew(1deg);
            opacity:.2
        }
    }

    @keyframes phonering-alo-circle-fill-anim {
        0% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            transform:rotate(0) scale(.7) skew(1deg);
            opacity:.2
        }

        50% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg);
            opacity:.2
        }

        100% {
            -webkit-transform:rotate(0) scale(.7) skew(1deg);
            transform:rotate(0) scale(.7) skew(1deg);
            opacity:.2
        }
    }

    @-webkit-keyframes phonering-alo-circle-img-anim {
        0% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg)
        }

        10% {
            -webkit-transform:rotate(-25deg) scale(1) skew(1deg);
            transform:rotate(-25deg) scale(1) skew(1deg)
        }

        20% {
            -webkit-transform:rotate(25deg) scale(1) skew(1deg);
            transform:rotate(25deg) scale(1) skew(1deg)
        }

        30% {
            -webkit-transform:rotate(-25deg) scale(1) skew(1deg);
            transform:rotate(-25deg) scale(1) skew(1deg)
        }

        40% {
            -webkit-transform:rotate(25deg) scale(1) skew(1deg);
            transform:rotate(25deg) scale(1) skew(1deg)
        }

        50% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg)
        }

        100% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg)
        }
    }

    @keyframes phonering-alo-circle-img-anim {
        0% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg)
        }

        10% {
            -webkit-transform:rotate(-25deg) scale(1) skew(1deg);
            transform:rotate(-25deg) scale(1) skew(1deg)
        }

        20% {
            -webkit-transform:rotate(25deg) scale(1) skew(1deg);
            transform:rotate(25deg) scale(1) skew(1deg)
        }

        30% {
            -webkit-transform:rotate(-25deg) scale(1) skew(1deg);
            transform:rotate(-25deg) scale(1) skew(1deg)
        }

        40% {
            -webkit-transform:rotate(25deg) scale(1) skew(1deg);
            transform:rotate(25deg) scale(1) skew(1deg)
        }

        50% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg)
        }

        100% {
            -webkit-transform:rotate(0) scale(1) skew(1deg);
            transform:rotate(0) scale(1) skew(1deg)
        }
    }
</style>
<script>
    map = L.map('googleMap1').setView([<?= Yii::$app->MyComponent->website['map']; ?>], 13);
    // set map tiles source
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);
    // add marker to the map
    marker = L.marker([<?= Yii::$app->MyComponent->website['map']; ?>]).addTo(map);
    // add popup to the marker
    marker.bindPopup('<?= Yii::$app->MyComponent->config['add-map']; ?>').openPopup();
</script>