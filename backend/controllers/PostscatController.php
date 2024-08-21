<?php

namespace backend\controllers;

use backend\models\Postscat;
use backend\models\PostscatSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\Posts;
use backend\models\Menu;
use yii\web\Response;

/**
 * PostscatController implements the CRUD actions for Postscat model.
 */
class PostscatController extends Controller {

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
     * Lists all Postscat models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PostscatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];

        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = Postscat::findOne($id);

            $out = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['Postscat']);
            $post = ['Postscat' => $posted];
            if ($model->load($post)) {
                $model->save();
                $output = '';
                if (isset($posted['position'])) {
                    $position = $posted['position'];
                    if ($position == 0) {
                        $output = 'Not set';
                    } elseif ($position == 1) {
                        $output = 'Footer';
                    }
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
     * Displays a single Postscat model.
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
     * Creates a new Postscat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Postscat();
        $arrList = Postscat::find()->asArray()->all();

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
     * Updates an existing Postscat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $arrList = Postscat::find()->where("id != " . $id . ' and parent != ' . $id)->asArray()->all();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $itemMenus = Menu::findAll(['model' => 'Postscat', 'model_id' => $id]);
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
     * Deletes an existing Postscat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $modelCategory = (new Postscat())->getCateChild($id);
        $itemMenus = (new Menu())->getAllId('Postscat', $id);
        if ($itemMenus) {
            Menu::deleteAll(['id' => $itemMenus]);
        }
        if ($modelCategory) {
            $posts = Posts::findAll(['parent' => $modelCategory]);
            if ($posts) {
                Posts::deleteAll(['parent' => $modelCategory]);
            }
            Postscat::deleteAll(['id' => $modelCategory]);
        } else {
            $posts = Posts::findAll(['parent' => $id]);
            if ($posts) {
                Posts::deleteAll(['parent' => $id]);
            }
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionBulkdelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $modelCategory = (new Postscat())->getCateChild($pk);
            $itemMenus = (new Menu())->getAllId('Postscat', $pk);
            if ($itemMenus) {
                Menu::deleteAll(['id' => $itemMenus]);
            }
            if ($modelCategory) {
                $posts = Posts::findAll(['parent' => $modelCategory]);
                if ($posts) {
                    Posts::deleteAll(['parent' => $modelCategory]);
                }
                Postscat::deleteAll(['id' => $modelCategory]);
            } else {
                $posts = Posts::findAll(['parent' => $pk]);
                if ($posts) {
                    Posts::deleteAll(['parent' => $pk]);
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
     * Finds the Postscat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Postscat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Postscat::findOne($id)) !== null) {
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
