<?php
/* @var $this yii\web\View */
$this->title = $model['title'];
?>

<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-xs-12">
                <div class="_title-dm"><?= $model['name_' . Yii::$app->language] ?></div>
            </div>
        </div>
        <div class="clearfix margin-bottom-20"></div>
        <?php
        if ($models) {
            foreach ($models as $keyN => $valueN) {
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
                <div class="row">
                    <div class="col-md-12 wow fadeInDown margin-bottom-30">
                        <div>
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
                </div>
                <div class="clearfix margin-bottom-20"></div>
                <?php
            }
        }
        ?>
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