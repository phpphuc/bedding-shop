<?php

namespace frontend\components;

use Yii;
use yii\base\Component;
use TonchikTm\Yii2Thumb\ImageThumb;

class MyComponent extends Component {

    public $website;
    public $config;

    public function init() {
        $this->website = \backend\models\Config::findOne(1);
        $this->config = \yii\helpers\ArrayHelper::map(\backend\models\Configs::find()->all(), 'key', 'value');
        parent::init();
    }

    public function myTruncate($string, $limit, $break = ".", $pad = "...") {
        // return with no change if string is shorter than $limit
        if (strlen($string) <= $limit)
            return $string;

        // is $break present between $limit and the end of the string?
        if (false !== ($breakpoint = strpos($string, $break, $limit))) {
            if ($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }
        return $string;
    }

    public function utf8convert($str) {

        if (!$str)
            return false;

        $utf8 = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ|Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );

        foreach ($utf8 as $ascii => $uni)
            $str = preg_replace("/($uni)/i", $ascii, $str);

        return $str;
    }

    public function getLink($type, $id) {
        switch ($type) {
            case 'Home':
                $link = \Yii::$app->homeUrl;
                break;
            case 'AllProducts':
                $link = Yii::$app->urlManager->createUrl(('/san-pham'));
                break;
            case 'AllCombos':
                $link = Yii::$app->urlManager->createUrl(('/combos'));
                break;
            case 'AllVideos':
                $link = Yii::$app->urlManager->createUrl(('/video-clip'));
                break;
            case 'Categorys':
                $model = \backend\models\Categorys::findOne($id);
                $link = Yii::$app->urlManager->createUrl(('/san-pham/' . $model['slug']));
                break;
            case 'Contact':
                $link = Yii::$app->urlManager->createUrl(('/lien-he'));
                break;
            case 'Thuvien':
                $link = Yii::$app->urlManager->createUrl(('/thu-vien'));
                break;
            case 'Sale':
                $link = Yii::$app->urlManager->createUrl(('/san-pham-sale'));
                break;
            case 'Page':
                $model = \backend\models\Page::findOne($id);
                $link = Yii::$app->urlManager->createUrl(('/bai-viet/' . $model['slug']));
                break;
            case 'Postscat':
                $model = \backend\models\Postscat::findOne($id);
                $link = Yii::$app->urlManager->createUrl(('/danh-muc/' . $model['slug']));
                break;
            case 'Posts':
                $model = \backend\models\Posts::findOne($id);
                $link = Yii::$app->urlManager->createUrl(('/chi-tiet-bai-viet/' . $model['slug']));
                break;
            case 'Comboscat':
                $model = \backend\models\Comboscat::findOne($id);
                $link = Yii::$app->urlManager->createUrl(('/combos-cat/' . $model['slug']));
                break;
            case 'Videoscat':
                $model = \backend\models\Videoscat::findOne($id);
                $link = Yii::$app->urlManager->createUrl(('/videos-cat/' . $model['slug']));
                break;
            default:
                $link = \Yii::$app->homeUrl;
                break;
        }
        return $link;
    }

    public function menuGenerator($type, $parent) {
        $menu = \backend\models\Menu::find()->where(['type' => $type, 'parent' => $parent])->orderBy('number asc, id desc')->all();
        foreach ($menu as $key => $value) {
            $id = $value['id'];
            $name = $value['name_' . Yii::$app->language];
            $link = $this->getLink($value['model'], $value['model_id']);
            $subMenu = \backend\models\Menu::find()->where(['type' => $type, 'parent' => $id])->orderBy('number asc, id desc')->all();
            if ($subMenu) {
                ?>
                <li aria-haspopup="true">
                    <a href="<?= $link; ?>" title="<?= $name; ?>">
                        <?= $name; ?>
                    </a>
                    <div class="grid-container2">
                        <ul>
                            <?php $this->menuGenerator($type, $id); ?>
                        </ul>
                    </div>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a class="<?= ($value['model'] == "Home") ? '_active-home' : ''; ?>" href="<?= $link; ?>" title="<?= ($value['model'] == "Home") ? 'Trang chủ' : $name; ?>">
                        <?= $name; ?>
                    </a>
                </li>
                <?php
            }
        }
    }

    public function menuMobileGenerator($type, $parent) {
        $menu = \backend\models\Menu::find()->where(['type' => $type, 'parent' => $parent])->orderBy('number asc, id desc')->all();
        foreach ($menu as $key => $value) {
            $id = $value['id'];
            $name = $value['name_' . Yii::$app->language];
            $link = $this->getLink($value['model'], $value['model_id']);
            $subMenu = \backend\models\Menu::find()->where(['type' => $type, 'parent' => $id])->orderBy('number asc, id desc')->all();
            if ($subMenu) {
                ?>
                <li>
                    <a href="<?= $link; ?>" title="<?= $name; ?>">
                        <?= $name; ?>
                    </a>
                    <ul>
                        <?php $this->menuMobileGenerator($type, $id); ?>
                    </ul>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a href="<?= $link; ?>" title="<?= $name; ?>">
                        <?= $name; ?>
                    </a>
                </li>
                <?php
            }
        }
    }

    public function menuFooterGenerator($type, $parent) {
        $menu = \backend\models\Menu::find()->where(['type' => $type, 'parent' => $parent])->orderBy('number asc, id desc')->all();
        foreach ($menu as $key => $value) {
            $name = $value['name_' . Yii::$app->language];
            $link = $this->getLink($value['model'], $value['model_id']);
            ?>
            <li>
                <a href="<?= $link; ?>" title="<?= $name; ?>">
                    - <?= $name; ?>
                </a>
            </li>
            <?php
        }
    }

    public function menuCatGenerator($parent) {
        $menu = \backend\models\Categorys::find()->where(['status' => 1, 'parent' => $parent])->orderBy('number asc, id desc')->all();
        foreach ($menu as $key => $value) {
            $id = $value['id'];
            $subId = $value['parent'];
            $name = $value['name_' . Yii::$app->language];
            $icon = $value['icon'];
            $link = Yii::$app->urlManager->createUrl('/san-pham/' . $value['slug']);
            $subMenu = \backend\models\Categorys::find()->where(['status' => 1, 'parent' => $id])->orderBy('number asc, id desc')->all();
            if ($subMenu) {
                ?>
                <li aria-haspopup="true">
                    <a href="<?= $link; ?>" title="<?= $name; ?>">
                        <?php
                        if ($subId == 0) {
                            ?>
                            <div class="text-center">
                                <div><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $icon), 69, 58, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_INSET], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $name, 'class' => 'lazy']]]); ?></div>
                                <div style="margin: 5px 0;"><?= $name; ?></div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="text-left"><?= $name; ?></div>
                            <?php
                        }
                        ?>
                    </a>
                    <div class="grid-container2">
                        <ul>
                            <?php $this->menuCatGenerator($id); ?>
                        </ul>
                    </div>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a href="<?= $link; ?>" title="<?= $name; ?>">
                        <?php
                        if ($subId == 0) {
                            ?>
                            <div class="text-center">
                                <div><?= ImageThumb::thumbPicture(Yii::getAlias('@rootpath/' . $icon), 69, 58, ['source' => ['quality' => 80, 'mode' => ImageThumb::THUMBNAIL_INSET], 'img' => ['mode' => ImageThumb::THUMBNAIL_INSET, 'quality' => 80, 'attributes' => ['alt' => $name, 'class' => 'lazy']]]); ?></div>
                                <div style="margin: 5px 0;"><?= $name; ?></div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="text-left"><?= $name; ?></div>
                            <?php
                        }
                        ?>
                    </a>
                </li>
                <?php
            }
        }
    }

    public function menuCatMobileGenerator($parent) {
        $menu = \backend\models\Categorys::find()->where(['status' => 1, 'parent' => $parent])->orderBy('number asc, id desc')->all();
        foreach ($menu as $key => $value) {
            $id = $value['id'];
            $name = $value['name_' . Yii::$app->language];
            $link = Yii::$app->urlManager->createUrl('/san-pham/' . $value['slug']);
            $subMenu = \backend\models\Categorys::find()->where(['status' => 1, 'parent' => $id])->orderBy('number asc, id desc')->all();
            if ($subMenu) {
                ?>
                <li>
                    <a href="<?= $link; ?>" title="<?= $name; ?>">
                        <?= $name; ?>
                    </a>
                    <ul>
                        <?php $this->menuCatGenerator($id); ?>
                    </ul>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a href="<?= $link; ?>" title="<?= $name; ?>">
                        <?= $name; ?>
                    </a>
                </li>
                <?php
            }
        }
    }

    function sw_get_current_weekday() {
        $date = getdate();
        switch ($date['weekday']) {
            case 'Monday':
                $weekday = 'Thứ hai';
                break;
            case 'Tuesday':
                $weekday = 'Thứ ba';
                break;
            case 'Wednesday':
                $weekday = 'Thứ tư';
                break;
            case 'Thursday':
                $weekday = 'Thứ năm';
                break;
            case 'Friday':
                $weekday = 'Thứ sáu';
                break;
            case 'Saturday':
                $weekday = 'Thứ bảy';
                break;
            default:
                $weekday = 'Chủ nhật';
                break;
        }
        return $weekday . ', Ngày ' . $date['mday'] . ' Tháng ' . $date['mon'] . ' Năm ' . $date['year'];
    }

}
?>

