<?php

namespace frontend\controllers;

use frontend\components\MyController;
use yii\data\Pagination;
use frontend\components\OpenGraph;
use frontend\components\MetaTags;
use backend\models\Videoscat;
use backend\models\Videos;
use yii\web\NotFoundHttpException;

class VideosController extends MyController {

    public $defaultPageSize = 16;

    public function actionIndex() {

        MetaTags::generate(
                [
                    'keywords' => $this->website['keyword'],
                    'description' => $this->website['description'],
                    'twitter:card' => 'summary',
                ]
        );
        OpenGraph::generate(
                [
                    'og:site_name' => $this->website['name_' . \Yii::$app->language],
                    'og:title' => $this->website['title'],
                    'og:description' => $this->website['description'],
                    'og:type' => 'website',
                    'og:image' => \Yii::$app->request->hostInfo . $this->website['logo'],
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/video-clip'),
                ]
        );

        $query = Videos::find()->where(['status' => 1]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $this->defaultPageSize]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('number asc, id desc')
                ->all();

        if ($this->isMobile) {
            return $this->render('index_m', ['models' => $models, 'pages' => $pages]);
        } else {
            return $this->render('index', ['models' => $models, 'pages' => $pages]);
        }
    }

    public function actionVideoscat($slug) {

        $model = $this->findModelvideos($slug);

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
                    'og:image' => \Yii::$app->request->hostInfo . $this->website['logo'],
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/videos/' . $model['slug']),
                ]
        );

        $cate = new Videoscat();
        $modelCategory = $cate->getCateChild($model['id']);
        if ($modelCategory) {
            $query = Videos::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory) . ')');
        } else {
            $query = Videos::find()->where('status = 1 and parent = ' . $model['id']);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $this->defaultPageSize]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('number asc, id desc')
                ->all();
        if ($this->isMobile) {
            return $this->render('videoscat_m', ['models' => $models, 'model' => $model, 'pages' => $pages]);
        } else {
            return $this->render('videoscat', ['models' => $models, 'model' => $model, 'pages' => $pages]);
        }
    }

    protected function findModelvideos($slug) {
        if (($model = Videoscat::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }

}
