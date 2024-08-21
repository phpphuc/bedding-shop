<?php
/* @var $this yii\web\View */
$this->title = $models['title'];
?>

<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="_title-dm"><?= $models['name_' . Yii::$app->language]; ?></div>
            </div>
        </div>
        <div class="clearfix margin-bottom-20"></div>
        <div class="row">
            <div class="col-md-12">
                <div><img width="100%" src="<?= $models['image'] ?>" alt="<?= $models['name_' . Yii::$app->language]; ?>" /></div>
                <div class="_des-combo"><?= $models['des_' . Yii::$app->language]; ?></div>
            </div>
            <div class="col-md-12 text-center">
                <div class="_price-combo-detail">Tổng giá trị sản phẩm: <?= $models['price'] ? number_format($models['price']) . '₫' : 'Liên hệ'; ?></div>
            </div>
            <div class="col-md-12 text-center">
                <div class="_price-combo-detail">Mua nguyên bộ Combo: <?= $models['price'] ? number_format($models['price_promotion']) . '₫' : 'Liên hệ'; ?></div>
            </div>
            <div class="col-md-12 text-center">
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
</div>
<div class="clearfix margin-bottom-20"></div>
<?php
$script = '$(document).ready(function () {
        window.onload = function () {
            setTimeout(function () {
                $("html, body").animate({scrollTop: "180px"}, "fast");
            }, 3);
        };
    });';
$this->registerJs($script);
?>