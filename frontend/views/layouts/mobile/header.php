<?php
use yii\helpers\Html;
use TonchikTm\Yii2Thumb\ImageThumb;
?>
<div class="pagewrap">
    <div class="_bgheader">
        <div class="row">
            <div class="col-xs-9 padding-right-0">
                <span id="hamburger" class="Sticky">
                    <a href="#menu" class="mburger mburger--tornado">
                        <b></b>
                        <b></b>
                        <b></b>
                    </a>
                </span> 
            </div>
       
            <div class="col-xs-3 text-right">
                <div class="ngonngu">
                    <div class="language_VN">
                        <?= Html::a(yii\helpers\Html::img('@web/desktop/images/icon_vn.png', ['alt' => '']), 'javascript:;', ['title' => 'Tiếng việt', 'class' => 'language', 'data-lg' => 'vi']); ?></a>
                    </div>  
                <!--     <div class="language_english">
                        <?//= Html::a(yii\helpers\Html::img('@web/desktop/images/icon_en.png', ['alt' => '']), 'javascript:;', ['title' => 'Tiếng anh', 'class' => 'language', 'data-lg' => 'en']); ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="_banner">
        <div class="row">
            <div class="col-xs-12 text-center padding-left-0 padding-right-0">
                <div class="_logo"><a href="<?= Yii::$app->homeUrl; ?>" title="Logo"><img src="<?= Yii::$app->MyComponent->website['logo']; ?>" alt="logo" class="lazy" ></a></div>
            </div>
        </div>
    </div>
</div>
<nav id="menu">
    <ul>
        <?php Yii::$app->MyComponent->menuMobileGenerator('main', 0); ?>
    </ul>
</nav>