<?php

namespace frontend\controllers;

use backend\models\Page;
use frontend\components\MyController;
use frontend\components\OpenGraph;
use frontend\components\MetaTags;
use yii\web\NotFoundHttpException;

class PageController extends MyController {

    public function actionIndex($slug) {

        $model = $this->findModel($slug);
        MetaTags::generate(
                [
                    'keywords' => $model['keyword'],
                    'description' => $model['description'],
                    'twitter:card' => 'summary',
                ]
        );
        OpenGraph::generate(
                [
                    'og:title' => $model['title'],
                    'og:description' => $model['description'],
                    'og:type' => 'website',
                    'og:image' => !empty($model['image']) ? \Yii::$app->request->hostInfo . $model['image'] : \Yii::$app->request->hostInfo . $this->website['logo'],
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/bai-viet/' . $model['slug']),
                ]
        );
        if ($this->isMobile) {
            return $this->render('index_m', ['model' => $model]);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }

    protected function findModel($slug) {
        if (($model = Page::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }

}
