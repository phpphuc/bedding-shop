<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\models\AdminLoginForm;
use common\models\Admin;
use backend\models\AdminSignupForm;
use backend\models\ResetPasswordForm;
use backend\models\AdminSearch;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'loginLayout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AdminLoginForm();
        echo $model->username;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLanguage()
    {
        if (isset($_POST['lang'])) {
            Yii::$app->language = $_POST['lang'];
            $cookie = new \yii\web\Cookie([
                'name' => 'lang',
                'value' => $_POST['lang'],
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Yii::$app->user->loginUrl);
    }

    public function actionUserlist()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('userlist', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSignup()
    {
        $model = new AdminSignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                return $this->redirect(['userlist']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionReset($id)
    {
        $model = new ResetPasswordForm($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            return $this->redirect(['userlist']);
        }

        return $this->render('reset', [
            'model' => $model,
        ]);
    }

    public function actionResetadmin()
    {
        $id = Yii::$app->user->id;
        $model = new ResetPasswordForm($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->user->logout();
            return $this->redirect(Yii::$app->user->loginUrl);
        }

        return $this->render('reset', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        Admin::findById($id)->delete();

        return $this->redirect(['userlist']);
    }

    public function actionStatus()
    {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $model = Admin::findById($id);
            if ($model->status == 0) {
                $model->status = 10;
                $model->save(); // save the change to database
            } else if ($model->status == 10) {
                $model->status = 0;
                $model->save(); // save the change to database
            }
        }
    }
}
