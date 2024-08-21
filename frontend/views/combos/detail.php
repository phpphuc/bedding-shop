<?php
/* @var $this yii\web\View */
$this->title = $models['title'];
?>

<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>">Trang chủ</a>
                <a class="mybreadcrumb__step" href="<?= Yii::$app->urlManager->createUrl('/combos'); ?>">COMBOS</a>
                <a class="mybreadcrumb__step" href="<?= Yii::$app->urlManager->createUrl('/combos-cat/' . $model['slug']); ?>"><?= $model['name_' . Yii::$app->language] ?></a>
                <a class="mybreadcrumb__step" href="javascript:;"><?= Yii::$app->MyComponent->myTruncate($models['name_' . Yii::$app->language], 50, " ", "..."); ?></a>
            </div>
            <div class="clearfix margin-bottom-20"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 style="margin: 0 0 30px;"><?= $models['name_' . Yii::$app->language]; ?></h2>
            <div><img width="100%" src="<?= $models['image'] ?>" alt="<?= $models['name_' . Yii::$app->language]; ?>" /></div>
            <div class="_des-combo"><?= $models['des_' . Yii::$app->language]; ?></div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
            <div class="_price-combo-detail">Tổng giá trị sản phẩm: <?= $models['price'] ? number_format($models['price']) . '₫' : 'Liên hệ'; ?></div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
            <div class="_price-combo-detail">Mua nguyên bộ Combo: <?= $models['price'] ? number_format($models['price_promotion']) . '₫' : 'Liên hệ'; ?></div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
            <?php
            if ($models['price'] && $models['price_promotion']) {
                $tietkiem = $models['price'] - $models['price_promotion'];
                ?>
                <div class="_price-combo-detail">Tiết kiệm: <?= number_format($tietkiem); ?>₫</div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
$script = '$(document).ready(function () {
        window.onload = function () {
            setTimeout(function () {
                $("html, body").animate({scrollTop: "600px"}, "fast");
            }, 3);
        };
    });';
$this->registerJs($script);
?>