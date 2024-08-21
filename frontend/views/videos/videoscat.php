<?php
/* @var $this yii\web\View */
$this->title = $model['title'];
?>

<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <a class="mybreadcrumb__step" href="javascript:;"><?= $model['name_' . Yii::$app->language]; ?></a>
            </div>
            <div class="clearfix margin-bottom-20"></div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($models) {
            $stt = 0;
            foreach ($models as $key => $value) {
                $stt++;
                $name = $value['name_' . Yii::$app->language];
                $img = $value['image'];
                $videoId = $value['video_id'];
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 margin-bottom-20 wow fadeInDown text-center">
                    <div class="_itemsContainer">
                        <a data-fancybox="videos" href="https://www.youtube.com/watch?v=<?= $videoId; ?>">
                            <img height="250px" src="<?= $img; ?>" alt="<?= $name; ?>" />
                            <div class="_play"><?= \yii\helpers\Html::img('@web/images/iconplay.png', ['alt' => 'icon play']); ?></div>
                        </a>
                    </div>
                    <div class="_name-vd"><?= $name; ?></div>
                </div>
                <?php
                if ($stt % 4 == 0) {
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