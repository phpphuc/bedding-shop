<div class="_box-mn-left wow fadeInLeft">
    <div class="_tit-mn-left">Danh Mục Sản Phẩm</div>
    <div class="_boxleft">
        <ul class="sky-mega-menu-left sky-mega-menu-pos-left sky-mega-menu-anim-slide">	
            <?php Yii::$app->MyComponent->menuCatGenerator(0); ?>
        </ul>
    </div>
</div>
<div class="clearfix margin-bottom-20"></div>
<div class="_box-mn-left wow fadeInLeft">
    <div class="_tit-mn-left">Hỗ Trợ Trực Tuyến</div>
    <div class="_boxleft text-center">
        <div><img src="/desktop/images/imght1.jpg" alt=""/></div>
        <div class="_hotline-ht"><?= Yii::$app->MyComponent->website['phone']; ?></div>
        <div class="_boxht">
            <div class="_name-ht"><?= Yii::$app->MyComponent->config['namesp1']; ?></div>
            <div class="_phone-ht">Phone: <span><?= Yii::$app->MyComponent->config['phonesp1']; ?></span></div>
            <div class="_email-ht">Email <span><?= Yii::$app->MyComponent->config['emailsp1']; ?></span></div>
        </div>
        <div class="_boxht">
            <div class="_name-ht"><?= Yii::$app->MyComponent->config['namesp2']; ?></div>
            <div class="_phone-ht">Phone: <span><?= Yii::$app->MyComponent->config['phonesp2']; ?></span></div>
            <div class="_email-ht">Email <span><?= Yii::$app->MyComponent->config['emailsp2']; ?></span></div>
        </div>
        <div class="clearfix margin-bottom-10"></div>
    </div>
</div>
