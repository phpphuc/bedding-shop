<?php

namespace backend\controllers;

use backend\models\Combos;
use backend\models\CombosSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * CombosController implements the CRUD actions for Combos model.
 */
class CombosController extends Controller {

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
     * Lists all Combos models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CombosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];

        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = Combos::findOne($id);

            $out = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['Combos']);
            $post = ['Combos' => $posted];
            if ($model->load($post)) {
                $model->save();
                $output = '';
                if (isset($posted['parent'])) {
                    $category = \backend\models\Comboscat::findOne($model->parent);
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
     * Displays a single Combos model.
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
     * Creates a new Combos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Combos();

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
     * Updates an existing Combos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Combos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBulkdelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
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
     * Finds the Combos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Combos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Combos::findOne($id)) !== null) {
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
