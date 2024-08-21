<?php
/* @var $this yii\web\View */
$this->title = 'COMBOS';
?>

<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>">Trang chủ</a>
                <a class="mybreadcrumb__step" href="javascript:;">COMBOS</a>
            </div>
            <div class="clearfix margin-bottom-30"></div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($models) {
            $stt = 0;
            foreach ($models as $keyN => $valueN) {
                $stt++;
                $linkN = Yii::$app->urlManager->createUrl('/combos/' . $valueN['slug']);
                $nameN = $valueN['name_' . Yii::$app->language];
                if ($valueN['image']) {
                    $imgN = $valueN['image'];
                } else {
                    $imgN = '/frontend/web/desktop/images/no-img.jpg';
                }
                $price = $valueN['price'];
                $price_promotion = $valueN['price_promotion'];
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 wow fadeInDown margin-bottom-30">
                    <div class="hover14">
                        <a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><figure><img src="<?= $imgN; ?>" alt="<?= $nameN; ?>" /></figure></a> 
                    </div>
                    <div>
                        <div class="_name-combo"><a href="<?= $linkN; ?>" title="<?= $nameN; ?>"><?= $nameN; ?></a></div>
                        <div>
                            <?php
                            if ($price_promotion) {
                                ?>
                                <div class="_price-combo"><?= number_format($price_promotion); ?>₫</div>
                                <?php
                            } else {
                                ?>
                                <div class="_price-combo"><a href="<?= Yii::$app->urlManager->createUrl('/lien-he'); ?>" title="Liên hệ">Liên hệ</a></div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                if ($stt % 3 == 0) {
                    ?>
                    <div class="clearfix"></div>
                    <?php
                }
            }
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <?=
            yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
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