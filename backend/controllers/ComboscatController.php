<?php

namespace backend\controllers;

use backend\models\Comboscat;
use backend\models\ComboscatSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\Combos;
use backend\models\Menu;
use yii\web\Response;

/**
 * ComboscatController implements the CRUD actions for Comboscat model.
 */
class ComboscatController extends Controller {

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
     * Lists all Comboscat models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ComboscatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];

        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = Comboscat::findOne($id);

            $out = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['Comboscat']);
            $post = ['Comboscat' => $posted];
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
     * Displays a single Comboscat model.
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
     * Creates a new Comboscat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Comboscat();
        $arrList = Comboscat::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'arrList' => $arrList,
        ]);
    }

    /**
     * Updates an existing Comboscat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $arrList = Comboscat::find()->where("id != " . $id . ' and parent != ' . $id)->all();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $itemMenus = Menu::findAll(['model' => 'Comboscat', 'model_id' => $id]);
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
     * Deletes an existing Comboscat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $modelCategory = (new Comboscat())->getCateChild($id);
        $itemMenus = (new Menu())->getAllId('Comboscat', $id);
        if ($itemMenus) {
            Menu::deleteAll(['id' => $itemMenus]);
        }
        if ($modelCategory) {
            $combos = Combos::findAll(['parent' => $modelCategory]);
            if ($combos) {
                Combos::deleteAll(['parent' => $modelCategory]);
            }
            Comboscat::deleteAll(['id' => $modelCategory]);
        } else {
            $combos = Combos::findAll(['parent' => $id]);
            if ($combos) {
                Combos::deleteAll(['parent' => $id]);
            }
        }

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionBulkdelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $modelCategory = (new Comboscat())->getCateChild($pk);
            $itemMenus = (new Menu())->getAllId('Comboscat', $pk);
            if ($itemMenus) {
                Menu::deleteAll(['id' => $itemMenus]);
            }
            if ($modelCategory) {
                $combos = Combos::findAll(['parent' => $modelCategory]);
                if ($combos) {
                    Combos::deleteAll(['parent' => $modelCategory]);
                }
                Comboscat::deleteAll(['id' => $modelCategory]);
            } else {
                $combos = Combos::findAll(['parent' => $pk]);
                if ($combos) {
                    Combos::deleteAll(['parent' => $pk]);
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
     * Finds the Comboscat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comboscat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Comboscat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionHomepage() {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $model = $this->findModel($id);
            if ($model->homepage == 0) {
                $model->homepage = 1;
                $model->save(); // save the change to database
            } else if ($model->homepage == 1) {
                $model->homepage = 0;
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
