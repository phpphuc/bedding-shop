<?php

namespace backend\controllers;

use Yii;
use backend\models\Menu;
use backend\models\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller {

    private $arrModel = ["Home" => "Trang chủ", "Page" => "Bài viết đơn", "AllVideos" => "Danh mục video" , "Postscat" => "Danh mục bài viết", "Posts" => "Bài viết", "Contact" => "Liên hệ", "Thuvien" => "Thư viện"];

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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex($type) {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $type);
        $dataProvider->pagination = ['pageSize' => 25];
        $rowvisible = 0;
        if (Yii::$app->MyComponent->lang_num == 2) {
            $rowvisible = 1;
        }

        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = Menu::findOne($id);

            $out = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['Menu']);
            $post = ['Menu' => $posted];
            if ($model->load($post)) {
                $model->save();
            }
            return $out;
        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'rowvisible' => $rowvisible,
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Menu();
        $model->type = !empty($_GET['type']) ? $_GET['type'] : 'main';
        $arrList = Menu::find()->where(['type' => $model->type])->asArray()->all();
        $arrModel = $this->arrModel;
        $data[] = NULL;
        if (!empty($_POST['Menu']['model'])) {
            $postModel = $_POST['Menu']['model'];
            $postModel_id = $_POST['Menu']['model_id'];
            $name = $this->changeType($postModel, $postModel_id);
            $model->name_vi = $name['name_vi'];
            $model->name_en = $name['name_en'];
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'type' => $model->type]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'arrList' => $arrList,
                    'arrModel' => $arrModel,
                    'data' => $data,
        ]);
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $arrList = Menu::find()->where("id != " . $id . ' and parent != ' . $id . ' and type = "' . $model['type'] . '"')->asArray()->all();
        $arrModel = $this->arrModel;

        $data = $this->changeData($model->model);
        if (!empty($_POST['Menu']['model'])) {
            $postModel = $_POST['Menu']['model'];
            $postModel_id = $_POST['Menu']['model_id'];
            $name = $this->changeType($postModel, $postModel_id);
            $model->name_vi = $name['name_vi'];
            $model->name_en = $name['name_en'];
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'type' => $model->type]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'arrList' => $arrList,
                    'arrModel' => $arrModel,
                    'data' => $data,
        ]);
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $modelCategory = (new Menu())->getCateChild($id);
        if ($modelCategory) {
            Menu::deleteAll(['id' => $modelCategory]);
        }
        $model->delete();
        return $this->redirect(['index', 'type' => $model->type]);
    }

    public function actionBulkdelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $modelCategory = (new Menu())->getCateChild($pk);
            if ($modelCategory) {
                Menu::deleteAll(['id' => $modelCategory]);
            }
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
            return $this->redirect(['index', 'type' => $_GET['type']]);
        }
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChangeitem($model) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = [['id' => '', 'text' => '']];
        switch ($model) {
            case 'Home':
                $data[] = ['id' => 0, 'text' => "Trang chủ"];
                break;
            case 'AllProducts':
                $data[] = ['id' => 0, 'text' => "Sản phẩm"];
                break;
            case 'AllCombos':
                $data[] = ['id' => 0, 'text' => "COMBO"];
                break;
            case 'AllVideos':
                $data[] = ['id' => 0, 'text' => "Video clip"];
                break;
            case 'Contact':
                $data[] = ['id' => 0, 'text' => "Liên hệ"];
                break;
            case 'Thuvien':
                $data[] = ['id' => 0, 'text' => "Thư viện"];
                break;
            case 'Sale':
                $data[] = ['id' => 0, 'text' => "Sale"];
                break;
            case 'Page':
                $arr = \backend\models\Page::find()->all();
                foreach ($arr as $item) {
                    $data[] = ['id' => $item->id, 'text' => $item->name_vi];
                }
                break;
            case 'Postscat':
                $arr = \backend\models\Postscat::find()->all();
                foreach ($arr as $item) {
                    $data[] = ['id' => $item->id, 'text' => $item->name_vi];
                }
                break;
            case 'Posts':
                $arr = \backend\models\Posts::find()->all();
                foreach ($arr as $item) {
                    $data[] = ['id' => $item->id, 'text' => $item->name_vi];
                }
                break;
            case 'Categorys':
                $arr = \backend\models\Categorys::find()->all();
                foreach ($arr as $item) {
                    $data[] = ['id' => $item->id, 'text' => $item->name_vi];
                }
                break;
            case 'Comboscat':
                $arr = \backend\models\Comboscat::find()->all();
                foreach ($arr as $item) {
                    $data[] = ['id' => $item->id, 'text' => $item->name_vi];
                }
                break;
            case 'Videoscat':
                $arr = \backend\models\Videoscat::find()->all();
                foreach ($arr as $item) {
                    $data[] = ['id' => $item->id, 'text' => $item->name_vi];
                }
                break;
            default:
                $data[] = NULL;
                break;
        }
        return ['data' => $data];
    }

    public function changeType($postModel, $postModel_id) {
        switch ($postModel) {
            case 'Home':
                $name_vi = "Trang chủ";
                $name_en = "Home";
                break;
            case 'AllProducts':
                $name_vi = "Sản phẩm";
                $name_en = "Products";
                break;
            case 'AllCombos':
                $name_vi = "COMBO";
                $name_en = "COMBO";
                break;
            case 'AllVideos':
                $name_vi = "Video clip";
                $name_en = "Video clip";
                break;
            case 'Contact':
                $name_vi = "Liên hệ";
                $name_en = "Contact";
                break;
            case 'Thuvien':
                $name_vi = "Thư viện";
                $name_en = "";
                break;
            case 'Sale':
                $name_vi = "Sale";
                $name_en = "Sale";
                break;
            case 'Page':
                $name_vi = \backend\models\Page::find()->where(['id' => $postModel_id])->one()->name_vi;
                $name_en = \backend\models\Page::find()->where(['id' => $postModel_id])->one()->name_en;
                break;
            case 'Postscat':
                $name_vi = \backend\models\Postscat::find()->where(['id' => $postModel_id])->one()->name_vi;
                $name_en = \backend\models\Postscat::find()->where(['id' => $postModel_id])->one()->name_en;
                break;
            case 'Posts':
                $name_vi = \backend\models\Posts::find()->where(['id' => $postModel_id])->one()->name_vi;
                $name_en = \backend\models\Posts::find()->where(['id' => $postModel_id])->one()->name_en;
                break;
            case 'Categorys':
                $name_vi = \backend\models\Categorys::find()->where(['id' => $postModel_id])->one()->name_vi;
                $name_en = \backend\models\Categorys::find()->where(['id' => $postModel_id])->one()->name_en;
                break;
            case 'Comboscat':
                $name_vi = \backend\models\Comboscat::find()->where(['id' => $postModel_id])->one()->name_vi;
                $name_en = \backend\models\Comboscat::find()->where(['id' => $postModel_id])->one()->name_en;
                break;
            case 'Videoscat':
                $name_vi = \backend\models\Videoscat::find()->where(['id' => $postModel_id])->one()->name_vi;
                $name_en = \backend\models\Videoscat::find()->where(['id' => $postModel_id])->one()->name_en;
                break;
            default:
                $name_vi = "";
                $name_en = "";
                break;
        }
        return ['name_vi' => $name_vi, 'name_en' => $name_en];
    }

    public function changeData($model) {
        switch ($model) {
            case 'Home':
                $data = ['0' => "Trang chủ"];
                break;
            case 'AllProducts':
                $data = ['0' => "Sản phẩm"];
                break;
            case 'AllCombos':
                $data = ['0' => "COMBO"];
                break;
            case 'AllVideos':
                $data = ['0' => "Video clip"];
                break;
            case 'Contact':
                $data = ['0' => "Liên hệ"];
                break;
            case 'Thuvien':
                $data = ['0' => "Thư viện"];
                break;
            case 'Sale':
                $data = ['0' => "Sale"];
                break;
            case 'Page':
                $data = ArrayHelper::map(\backend\models\Page::find()->all(), 'id', 'name_vi');
                break;
            case 'Postscat':
                $data = ArrayHelper::map(\backend\models\Postscat::find()->all(), 'id', 'name_vi');
                break;
            case 'Posts':
                $data = ArrayHelper::map(\backend\models\Posts::find()->all(), 'id', 'name_vi');
                break;
            case 'Categorys':
                $data = ArrayHelper::map(\backend\models\Categorys::find()->all(), 'id', 'name_vi');
                break;
            case 'Comboscat':
                $data = ArrayHelper::map(\backend\models\Comboscat::find()->all(), 'id', 'name_vi');
                break;
            case 'Videoscat':
                $data = ArrayHelper::map(\backend\models\Videoscat::find()->all(), 'id', 'name_vi');
                break;
            default:
                $data = NULL;
                break;
        }
        return $data;
    }

}
