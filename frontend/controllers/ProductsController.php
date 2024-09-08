<?php

namespace frontend\controllers;

use backend\models\Products;
use backend\models\ProductsOp;
use backend\models\Categorys;
use frontend\components\MyController;
use yii\data\Pagination;
use frontend\components\OpenGraph;
use frontend\components\MetaTags;
use yii\web\NotFoundHttpException;

class ProductsController extends MyController
{

    public $defaultPageSize = 12;

    public function actionIndex()
    {
        $categories = Categorys::find()->where(['status' => 1])->all();
        // print_r($categories);
        return $this->render('index', ['categories' => $categories]);
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
                'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/san-pham'),
            ]
        );

        $query = Products::find()->where(['status' => 1]);
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

    public function actionIndex2()
    {

        $query = Products::find()->where(['status' => 1]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $this->defaultPageSize]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('number asc, id desc')
            ->all();
        return $this->render('index1', ['categories' => $models, 'pages' => $pages]);
    }

    public function actionCate($slug)
    {

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
                'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/san-pham/' . $model['slug']),
            ]
        );

        $cate = new Categorys();
        $modelCategory = $cate->getCateChild($model['id']);
        if ($modelCategory) {
            $query = Products::find()->where('status = 1 and parent IN (' . implode(',', $modelCategory) . ')');
        } else {
            $query = Products::find()->where('status = 1 and parent = ' . $model['id']);
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

    public function actionSale()
    {
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
                'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/san-pham-sale'),
            ]
        );

        $query = Products::find()->where(['status' => 1, 'promotion' => 1]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $this->defaultPageSize]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('number asc, id desc')
            ->all();
        if ($this->isMobile) {
            return $this->render('sale_m', ['models' => $models, 'pages' => $pages]);
        } else {
            return $this->render('sale', ['models' => $models, 'pages' => $pages]);
        }
    }

    public function actionView($slug)
    {
        \Yii::$app->db->createCommand()
            ->update(Products::tableName(), ['views' => new \yii\db\Expression('views+1')], ['slug' => $slug])
            ->execute();
        $models = $this->findProduct($slug);
        $model = Categorys::findOne($models['parent']);
        $productsSame = Products::find()->where('status = 1 and id != ' . $models['id'] . ' and parent = ' . $models['parent'])->asArray()->orderBy('number asc, id desc')->all();
        $productsBestseller = Products::find()->where('status = 1 and bestseller = 1')->orderBy('number asc, id desc')->asArray()->all();
        $options = ProductsOp::findAll(['parent' => $models['id']]);

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
                'og:url' => \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/chi-tiet-san-pham/' . $models['slug']),
            ]
        );

        if ($this->isMobile) {
            return $this->render('detail_m', ['models' => $models, 'options' => $options, 'model' => $model, 'productsSame' => $productsSame, 'productsBestseller' => $productsBestseller]);
        } else {
            return $this->render('detail', ['models' => $models, 'options' => $options, 'model' => $model, 'productsSame' => $productsSame, 'productsBestseller' => $productsBestseller]);
        }
    }

    public function actionTag($tag)
    {

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

        $query = Products::find()->where(['status' => 1]);
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

    public function actionSearch()
    {

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

        $query = Products::find()->where(['status' => 1]);
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

    public function actionRating()
    {
        if (!empty($_POST['id']) && !empty($_POST['value'])) {
            $model = Products::findOne($_POST['id']);
            $model->ratecount += $_POST['value'];
            $model->userrate += 1;
            if ($model->save()) {
                $model->rating = round($model->ratecount / $model->userrate);
                $model->save();
            }
        }
    }

    public function actionLoadmore()
    {
        $page = intval($_POST['page']);
        $query = Products::find()->where(['status' => 1, 'feature' => 1]);
        $models = $query->offset($page * 4)
            ->limit(4)
            ->orderBy('number asc, id desc')
            ->all();
        if ($this->isMobile) {
            return $this->renderPartial('loadmore', ['models' => $models]);
        } else {
            return $this->renderPartial('loadmore', ['models' => $models]);
        }
    }

    protected function findModel($slug)
    {
        if (($model = Categorys::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findProduct($slug)
    {
        if (($model = Products::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }
}
