<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use pa3py6aka\yii2\ModalAlert;

timurmelnikov\widgets\LoadingOverlayAsset::register($this);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1230">
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?= $this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]); ?>
    <?= $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Yii::$app->MyComponent->website['favicon']]); ?>

    <?php $this->head() ?>

    <!--        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script> -->

    <?= Yii::$app->MyComponent->website['schema']; ?>

    <?= Yii::$app->MyComponent->website['headtag']; ?>

</head>

<body id="target-loading">
    <?php $this->beginBody() ?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=1879502379031804&autoLogAppEvents=1"></script>
    <h1 style="display: none;"><?= Html::encode($this->title) ?></h1>
    <?php include 'header.php'; ?>

    <?=
    ModalAlert::widget([
        'showTime' => 3,
    ])
    ?>
    <?= $content ?>
    <?php include 'footer.php';
    ?>
    <?php
    if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') {
    ?>
        <div style="display: none;"><?= Yii::$app->MyComponent->website['heading']; ?></div>
    <?php
    }
    ?>

    <?= Yii::$app->MyComponent->website['bodytag']; ?>

    <style type="text/css">
        <?= Yii::$app->MyComponent->website['customcss']; ?>
    </style>

    <a id="back-top"><i class="far fa-arrow-alt-circle-up"></i></a>

    <?php
    $script = '$.LoadingOverlaySetup({
            color           : "rgba(0, 0, 0, 0.4)",
            maxSize         : "80px",
            minSize         : "20px",
            resizeInterval  : 0,
            size            : "50%"
        });
        $(document).ajaxSend(function(event, jqxhr, settings){
            $("#target-loading").LoadingOverlay("show");
        });
        $(document).ajaxComplete(function(event, jqxhr, settings){
            $("#target-loading").LoadingOverlay("hide");
        });';
    $this->registerJs($script, yii\web\View::POS_READY);
    ?>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>