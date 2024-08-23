<?php

use backend\models\Slideshow;
use TonchikTm\Yii2Thumb\ImageThumb;

$this->registerCssFile('https://unpkg.com/swiper/swiper-bundle.min.css');
$this->registerJsFile('https://unpkg.com/swiper/swiper-bundle.min.js');
$this->registerJs(<<<JS
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
JS);
$slides = Slideshow::find()->where(['parent' => 1, 'homepage' => 1])->orderBy('number asc, id desc')->all();
?>
<div class="">
  <div class="swiper-container  m-auto bg-purple-400">
    <div class="swiper-wrapper">
      <?php
      foreach ($slides as $slide) {

      ?>
        <div class="swiper-slide">
          <img src="<?= $slide['image'] ?>" alt="Slide 1" class="mx-auto">
        </div>

      <?php //break;
      } ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

</div>