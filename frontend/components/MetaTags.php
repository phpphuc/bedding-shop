<?php

namespace frontend\components;

use Yii;

class MetaTags {

    public static function generate($properties) {
        foreach ($properties as $item => $value) {
            Yii::$app->view->registerMetaTag([
                'name' => $item,
                'content' => $value,
            ]);
        }
    }

}
