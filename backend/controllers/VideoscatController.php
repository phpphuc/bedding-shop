<?php

namespace backend\controllers;

use Yii;
use backend\models\Videoscat;
use backend\models\VideoscatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Menu;
use backend\models\Videos;
use yii\helpers\Json;
use yii\web\Response;

/**
 * VideoscatController implements the CRUD actions for Videoscat model.
 */
class VideoscatController extends Controller {

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
     * Lists all Videoscat models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new VideoscatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];

        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = Videoscat::findOne($id);

            $out = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['Videoscat']);
            $post = ['Videoscat' => $posted];
            if ($model->load($post)) {
                $model->save();
            }
            return $out;
        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Videoscat model.
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
     * Creates a new Videoscat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Videoscat();
        $arrList = Videoscat::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
                    'arrList' => $arrList,
        ]);
    }

    /**
     * Updates an existing Videoscat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $arrList = Videoscat::find()->where("id != " . $id . ' and parent != ' . $id)->asArray()->all();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $itemMenus = Menu::findAll(['model' => 'Videoscat', 'model_id' => $id]);
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
                    'arrList' => $arrList,
        ]);
    }

    /**
     * Deletes an existing Videoscat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $modelCategory = (new Videoscat())->getCateChild($id);
        $itemMenus = (new Menu())->getAllId('Videoscat', $id);
        if ($itemMenus) {
            Menu::deleteAll(['id' => $itemMenus]);
        }
        if ($modelCategory) {
            $videos = Videos::findAll(['parent' => $modelCategory]);
            if ($videos) {
                Videos::deleteAll(['parent' => $modelCategory]);
            }
            Videoscat::deleteAll(['id' => $modelCategory]);
        } else {
            $videos = Videos::findAll(['parent' => $id]);
            if ($videos) {
                Videos::deleteAll(['parent' => $id]);
            }
        }

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionBulkdelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $modelCategory = (new Videoscat())->getCateChild($pk);
            $itemMenus = (new Menu())->getAllId('Videoscat', $pk);
            if ($itemMenus) {
                Menu::deleteAll(['id' => $itemMenus]);
            }
            if ($modelCategory) {
                $videos = Videos::findAll(['parent' => $modelCategory]);
                if ($videos) {
                    Videos::deleteAll(['parent' => $modelCategory]);
                }
                Videoscat::deleteAll(['id' => $modelCategory]);
            } else {
                $videos = Videos::findAll(['parent' => $pk]);
                if ($videos) {
                    Videos::deleteAll(['parent' => $pk]);
                }
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
     * Finds the Videoscat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Videoscat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Videoscat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
