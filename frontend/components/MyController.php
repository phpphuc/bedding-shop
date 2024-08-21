<?php

namespace frontend\components;

use Yii;
use yii\web\Controller;

class MyController extends Controller {

    public $isMobile = false;
    public $website;
    public $config;

    public function init() {
        $this->website = \backend\models\Config::findOne(1);
        $this->config = \yii\helpers\ArrayHelper::map(\backend\models\Configs::find()->all(), 'key', 'value');
        $this->isMobile = \Yii::$app->mobileDetect->isMobile();
        if ($this->isMobile) {
            \Yii::$app->layout = "mobile/main";
        } else {
          \Yii::$app->layout = "desktop/main";  
        }
        parent::init();
    }

}
?>