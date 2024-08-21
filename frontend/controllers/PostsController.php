<?php

namespace frontend\controllers;

use backend\models\Posts;
use backend\models\Postscat;
use frontend\components\MyController;
use yii\data\Pagination;
use frontend\components\OpenGraph;
use frontend\components\MetaTags;
use yii\web\NotFoundHttpException;

class PostsController extends MyController {

    public $defaultPageSize = 12;

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
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/danh-muc/' . $model['slug']),
                ]
        );

        $cate = new Postscat();
        $modelCategory = $cate->getCateChild($model['id']);
        if ($modelCategory) {
            $query = Posts::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory) . ')');
        } else {
            $query = Posts::find()->where('status = 1 and parent = ' . $model['id']);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $this->defaultPageSize]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('number asc, id desc')
                ->all();
        if ($this->isMobile) {
            return $this->render('index_m', ['models' => $models, 'model' => $model, 'pages' => $pages]);
        } else {
            return $this->render('index', ['models' => $models, 'model' => $model, 'pages' => $pages]);
        }
    }

    public function actionView($slug) {
        \Yii::$app->db->createCommand()
                ->update(Posts::tableName(), ['views' => new \yii\db\Expression('views+1')], ['slug' => $slug])
                ->execute();
        $models = $this->findPost($slug);
        $model = Postscat::findOne($models['parent']);
        $postsOther = Posts::find()->where('status = 1 and id != ' . $models['id'] . ' and parent = ' . $models['parent'])->limit(10)->orderBy('number asc, id desc')->all();

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
                    'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/chi-tiet-bai-viet/' . $models['slug']),
                ]
        );

        if ($this->isMobile) {
            return $this->render('detail_m', ['models' => $models, 'model' => $model, 'postsOther' => $postsOther]);
        } else {
            return $this->render('detail', ['models' => $models, 'model' => $model, 'postsOther' => $postsOther]);
        }
    }
    
    public function actionSearch() {

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

        $query = Posts::find()->where(['status' => 1]);
        if (!empty($_GET['keyword'])) {
            $query->andFilterWhere(['like', 'name_vi', $_GET['keyword']]);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $this->defaultPageSize]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('number asc, id desc')
                ->all();
        if ($this->isMobile) {
            return $this->render('search_m', ['models' => $models, 'pages' => $pages]);
        } else {
            return $this->render('search', ['models' => $models, 'pages' => $pages]);
        }
    }

    public function actionTag($tag) {

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

        $query = Posts::find()->where(['status' => 1]);
        $query->andFilterWhere(['like', 'tag_compare', $tag]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $this->defaultPageSize]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('number asc, id desc')
                ->all();
        if ($this->isMobile) {
            return $this->render('tag_m', ['models' => $models, 'pages' => $pages]);
        } else {
            return $this->render('tag', ['models' => $models, 'pages' => $pages]);
        }
    }

    protected function findModel($slug) {
        if (($model = Postscat::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findPost($slug) {
        if (($model = Posts::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }

}
