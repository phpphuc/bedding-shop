<?php

namespace backend\controllers;

use backend\models\Products;
use backend\models\ProductsSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\ProductsOp;
use yii\helpers\ArrayHelper;
use backend\models\Model;
use yii\web\Response;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller {

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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];

        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = Products::findOne($id);

            $out = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['Products']);
            $post = ['Products' => $posted];
            if ($model->load($post)) {
                $model->save();
                $output = '';
                if (isset($posted['parent'])) {
                    $category = \backend\models\Categorys::findOne($model->parent);
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
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Products();
        $modelsProductsOp = [new ProductsOp];

        if ($model->load(Yii::$app->request->post())) {
            if ($model->image && Yii::$app->MyComponent->watermark) {
                $model->image = Yii::$app->MyComponent->watermarkImage($model->image);
            }
            if ($model->save()) {
                $modelsProductsOp = Model::createMultiple(ProductsOp::classname());
                Model::loadMultiple($modelsProductsOp, Yii::$app->request->post());

                // validate all models
                $valid = $model->validate();
                $valid = Model::validateMultiple($modelsProductsOp) && $valid;

                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($modelsProductsOp as $modelProductsOp) {
                                $modelProductsOp->parent = $model->id;
                                if (!($flag = $modelProductsOp->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                        if ($flag) {
                            $transaction->commit();
                            return $this->redirect(['index']);
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
                }
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'modelsProductsOp' => (empty($modelsProductsOp)) ? [new ProductsOp] : $modelsProductsOp,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $modelsProductsOp = $this->getProductOp($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->image && Yii::$app->MyComponent->watermark) {
                $model->image = Yii::$app->MyComponent->watermarkImage($model->image);
            }
            $oldIDs = ArrayHelper::map($modelsProductsOp, 'id', 'id');
            $modelsProductsOp = Model::createMultiple(ProductsOp::classname(), $modelsProductsOp);
            Model::loadMultiple($modelsProductsOp, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsProductsOp, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsProductsOp) && $valid;

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            ProductsOp::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsProductsOp as $modelProductsOp) {
                            $modelProductsOp->parent = $model->id;
                            if (!($flag = $modelProductsOp->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
                    'model' => $model,
                    'modelsProductsOp' => (empty($modelsProductsOp)) ? [new ProductsOp] : $modelsProductsOp,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        ProductsOp::deleteAll(['parent' => $model->id]);
        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionBulkdelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            ProductsOp::deleteAll(['parent' => $model->id]);
            $model->delete();
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Products::findOne($id)) !== null) {
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

    public function actionNew() {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $model = $this->findModel($id);
            if ($model->new == 0) {
                $model->new = 1;
                $model->save(); // save the change to database
            } else if ($model->new == 1) {
                $model->new = 0;
                $model->save(); // save the change to database
            }
        }
    }

    public function actionBestseller() {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $model = $this->findModel($id);
            if ($model->bestseller == 0) {
                $model->bestseller = 1;
                $model->save(); // save the change to database
            } else if ($model->bestseller == 1) {
                $model->bestseller = 0;
                $model->save(); // save the change to database
            }
        }
    }

    public function actionPromotion() {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $model = $this->findModel($id);
            if ($model->promotion == 0) {
                $model->promotion = 1;
                $model->save(); // save the change to database
            } else if ($model->promotion == 1) {
                $model->promotion = 0;
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

    public function getProductOp($id) {
        $model = ProductsOp::find()->where(['parent' => $id])->all();
        return $model;
    }

}
