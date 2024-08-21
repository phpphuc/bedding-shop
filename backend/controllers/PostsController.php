<?php

namespace backend\controllers;

use backend\models\Posts;
use backend\models\PostsSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\Menu;
use yii\web\Response;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'bulkdelete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];

        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = Posts::findOne($id);

            $out = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['Posts']);
            $post = ['Posts' => $posted];
            if ($model->load($post)) {
                $model->save();
                $output = '';
                if (isset($posted['parent'])) {
                    $category = \backend\models\Postscat::findOne($model->parent);
                    $output = $category->name_vi;
                }
                $out = Json::encode(['output' => $output, 'message' => '']);
            }
            return $out;
        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $itemMenus = Menu::findAll(['model' => 'Posts', 'model_id' => $id]);
                if ($itemMenus) {
                    foreach ($itemMenus as $itemMenu) {
                        $itemMenu->name_vi = $model->name_vi;
                        $itemMenu->name_en = $model->name_en;
                        $itemMenu->save();
                    }
                }

                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $itemMenus = (new Menu())->getAllId('Posts', $id);
        if ($itemMenus) {
            Menu::deleteAll(['id' => $itemMenus]);
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionBulkdelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $itemMenus = (new Menu())->getAllId('Posts', $pk);
            if ($itemMenus) {
                Menu::deleteAll(['id' => $itemMenus]);
            }
            $this->findModel($pk)->delete();
        }

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFeature() {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $model = $this->findModel($id);
            if ($model->feature == 0) {
                $model->feature = 1;
                $model->save(); // save the change to database
            } else if ($model->feature == 1) {
                $model->feature = 0;
                $model->save(); // save the change to database
            }
        }
    }

    public function actionStatus() {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $model = $this->findModel($id);
            if ($model->status == 0) {
                $model->status = 1;
                $model->save(); // save the change to database
            } else if ($model->status == 1) {
                $model->status = 0;
                $model->save(); // save the change to database
            }
        }
    }

}
