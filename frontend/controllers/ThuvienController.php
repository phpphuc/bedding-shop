<?php

namespace frontend\controllers;

use backend\models\Thuvien;
use frontend\components\MyController;
use frontend\components\OpenGraph;
use frontend\components\MetaTags;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;

class ThuvienController extends MyController {
    
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
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/thu-vien'),
                ]
        );
        
        $query = Thuvien::find();
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
    
    public function actionView($slug) {

        $model = $this->findModel($slug);
        $postsOther = Thuvien::find()->where('id != ' . $model['id'])->orderBy('number asc, id desc')->all();
        MetaTags::generate(
                [
                    'keywords' => $this->website['keyword'],
                    'description' => $this->website['description'],
                    'twitter:card' => 'summary',
                ]
        );
        OpenGraph::generate(
                [
                    'og:title' => $this->website['title'],
                    'og:description' => $this->website['description'],
                    'og:type' => 'website',
                    'og:image' => !empty($model['image']) ? \Yii::$app->request->hostInfo . $model['image'] : \Yii::$app->request->hostInfo . $this->website['logo'],
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/thu-vien/' . $model['slug']),
                ]
        );
        if ($this->isMobile) {
            return $this->render('detail_m', ['model' => $model, 'postsOther' => $postsOther]);
        } else {
            return $this->render('detail', ['model' => $model, 'postsOther' => $postsOther]);
        }
    }

    protected function findModel($slug) {
        if (($model = Thuvien::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }

}
