<?php
/* @var $this yii\web\View */
$this->title = $models['title'];
?>

<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                <a class="mybreadcrumb__step" href="<?= Yii::$app->urlManager->createUrl('/danh-muc/' . $model['slug']); ?>"><?= $model['name_' . Yii::$app->language] ?></a>
                <a class="mybreadcrumb__step" href="javascript:;"><?= Yii::$app->MyComponent->myTruncate($models['name_' . Yii::$app->language], 50, " ", "..."); ?></a>
            </div>
            <div class="clearfix margin-bottom-20"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2><?= $models['name_' . Yii::$app->language]; ?></h2>
            <div class="_date-post">
                <ul class="list-inline">
                    <?php
                    $date = date_format(date_create($models['created_date']), 'd/m/Y');
                    ?>
                    <li><i class="fas fa-calendar-alt"></i> <?= $date; ?></li>
                    <li><i class="fas fa-eye"></i> <?= $models['views']; ?></li>		
                </ul>
            </div>
            <div><?= $models['content_' . Yii::$app->language]; ?></div>
            <div class="clearfix margin-bottom-10"></div>
      
            <?php
            if ($models['tag']) {
                $arrLink = explode(',', $models['tag_compare']);
                $arrName = explode(',', $models['tag']);
                $arrTag = array_combine($arrLink, $arrName);
                ?>
                <div class="clearfix margin-bottom-20"></div>
                <div class="_tagpr"><i class="fas fa-tags"></i> 
                    <?php
                    foreach ($arrTag as $key => $value) {
                        ?>
                        <a href="<?= Yii::$app->urlManager->createUrl('tag-post/' . $key); ?>" title="<?= $value; ?>"><?= $value; ?></a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="grid newdefault">
                <div class="title"><?= Yii::t('app', 'Related Posts') ?></div>
                <ul class="nottype">
                    <?php
                    if ($postsOther):
                        foreach ($postsOther as $related) :
                            $link = Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $related['slug']);
                            $name = $related['name_' . Yii::$app->language];
                            ?>
                            <li><a href="<?= $link; ?>" title="<?= $name; ?>">+ <?= $name; ?></a></li>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>