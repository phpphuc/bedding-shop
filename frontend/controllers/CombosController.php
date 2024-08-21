<?php

namespace frontend\controllers;

use backend\models\Combos;
use backend\models\Comboscat;
use frontend\components\MyController;
use yii\data\Pagination;
use frontend\components\OpenGraph;
use frontend\components\MetaTags;
use yii\web\NotFoundHttpException;

class CombosController extends MyController {

    public $defaultPageSize = 12;

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
                    'og:url' => \Yii::$app->request->hostInfo,
                ]
        );

        $query = Combos::find()->where(['status' => 1]);
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

    public function actionCate($slug) {

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
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/combos-cat/' . $model['slug']),
                ]
        );

        $cate = new Comboscat();
        $modelCategory = $cate->getCateChild($model['id']);
        if ($modelCategory) {
            $query = Combos::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory) . ')');
        } else {
            $query = Combos::find()->where('status = 1 and parent = ' . $model['id']);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $this->defaultPageSize]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('number asc, id desc')
                ->all();
        if ($this->isMobile) {
            return $this->render('cate_m', ['models' => $models, 'model' => $model, 'pages' => $pages]);
        } else {
            return $this->render('cate', ['models' => $models, 'model' => $model, 'pages' => $pages]);
        }
    }

    public function actionView($slug) {

        $models = $this->findPost($slug);
        $model = Comboscat::findOne($models['parent']);
        $postsOther = Combos::find()->where('status = 1 and id != ' . $models['id'] . ' and parent = ' . $models['parent'])->orderBy('number asc, id desc')->all();

        MetaTags::generate(
                [
                    'keywords' => $models['keyword'],
                    'description' => $models['description'],
                    'twitter:card' => 'summary',
                ]
        );
        OpenGraph::generate(
                [
                    'og:title' => $models['title'],
                    'og:description' => $models['description'],
                    'og:type' => 'website',
                    'og:image' => !empty($models['image']) ? \Yii::$app->request->hostInfo . $models['image'] : \Yii::$app->request->hostInfo . $this->website['logo'],
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/combos/' . $models['slug']),
                ]
        );

        if ($this->isMobile) {
            return $this->render('detail_m', ['models' => $models, 'model' => $model, 'postsOther' => $postsOther]);
        } else {
            return $this->render('detail', ['models' => $models, 'model' => $model, 'postsOther' => $postsOther]);
        }
    }

    protected function findModel($slug) {
        if (($model = Comboscat::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findPost($slug) {
        if (($model = Combos::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }

}
