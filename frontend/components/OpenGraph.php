<?php

namespace frontend\components;

use Yii;

class OpenGraph {

    public static function generate($properties) {
        foreach ($properties as $item => $value) {
            Yii::$app->view->registerMetaTag([
                'property' => $item,
                'content' => $value,
            ]);
        }
    }

}
