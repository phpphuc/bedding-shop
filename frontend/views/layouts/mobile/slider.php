<?php

use yii\helpers\Html;
use Imagine\Image\ManipulatorInterface;
use backend\models\Slideshow;
use backend\models\Camket;
use backend\models\Categorys;
use backend\models\Products;
?>
<div class="_slide">
     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->

            
    <?php
    $img_slider = Camket::find()->orderBy('number asc, id desc')->asArray()->all();
    $slideshows = Slideshow::find()->where(['parent' => 1, 'homepage' => 1])->orderBy('number asc, id desc')->all();
    if ($slideshows) {
        ?>
   <div class="carousel-inner">
                <?php
                $stt = 0;
                foreach ($slideshows as $items_img) {
                    $link = $items_img['link'];
                    ?>
                    <div class="item <?php if($stt == 0){?>active<?php } ?>">
                        <img src="<?php echo $items_img['image']; ?>" alt="<?php echo $items_img['name_vi']; ?>">
                    </div>
                    <?php
                    $stt++;
                }
                ?>
   </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

                    <span class="glyphicon glyphicon-chevron-left"></span>

                </a>

                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

                    <span class="glyphicon glyphicon-chevron-right"></span>

                </a>

         
        <?php
    }
    ?>
                   </div>
        </div>
