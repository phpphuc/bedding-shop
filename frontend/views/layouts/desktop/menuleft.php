<?php
use backend\models\Menu;

$menu = Menu::find()->where(['type' => 'left', 'parent' => 0])->orderBy('number asc, id desc')->all();
if ($menu) {
    foreach ($menu as $key => $value) {
        $id = $value['id'];
        $name = $value['name_' . Yii::$app->language];
        $link = Yii::$app->MyComponent->getLink($value['model'], $value['model_id']);
        $sub = Menu::find()->where(['type' => 'main', 'parent' => $id])->orderBy('number asc, id desc')->all();
        if ($sub) {
            ?>
            <li aria-haspopup="true">
                <a href="<?= $link; ?>" title="<?= $name; ?>">
                    <?php echo $name; ?>
                </a>
                <div class="grid-container2">
                    <ul>
                        <?php
                        foreach ($sub as $key2 => $value2) {
                            $id2 = $value2['id'];
                            $name2 = $value2['name_' . Yii::$app->language];
                            $link2 = Yii::$app->MyComponent->getLink($value2['model'], $value2['model_id']);
                            $sub2 = Menu::find()->where(['type' => 'main', 'parent' => $id2])->orderBy('number asc, id desc')->all();
                            if ($sub2) {
                                ?>
                                <li aria-haspopup="true">
                                    <a href="<?= $link2; ?>" title="<?= $name2; ?>">
                                        <?php echo $name2; ?>
                                    </a>
                                    <div class="grid-container2">
                                        <ul>
                                            <?php
                                            foreach ($sub2 as $key3 => $value3) {
                                                $name3 = $value3['name_' . Yii::$app->language];
                                                $link3 = Yii::$app->MyComponent->getLink($value3['model'], $value3['model_id']);
                                                ?>
                                                <li>
                                                    <a href="<?= $link3; ?>" title="<?= $name3; ?>">
                                                        <?php echo $name3; ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <a href="<?= $link2; ?>" title="<?= $name2; ?>">
                                        <?php echo $name2; ?>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </li>
            <?php
        } else {
            ?>
            <li>
                <a class="<?= ($value['model'] == "Home") ? '_active-home' : ''; ?>" href="<?= $link; ?>" title="<?= $name; ?>">
                    <?php echo $name; ?>
                </a>
            </li>
            <?php
        }
    }
}
?>

