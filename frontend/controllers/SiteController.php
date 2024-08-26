<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use frontend\components\MyController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\AuthItem;
use frontend\components\OpenGraph;
use frontend\components\MetaTags;
use backend\models\Page;
use backend\models\Categorys;
use backend\models\Postscat;
use backend\models\Camket;
use backend\models\Camnhan;
use backend\models\Videos;
use backend\models\Baogia;
use backend\models\Bacsi;
use backend\models\Chinhanh;
use backend\models\Khachhang;

/**
 * Site controller
 */
class SiteController extends MyController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
            'captcha' => [
                'class' => 'lubosdz\captchaExtended\CaptchaExtendedAction',
                // optionally, set mode and obfuscation properties e.g.:
                'mode' => 'words', //default|math|mathverbal|logical|words
                //'mode' => CaptchaExtendedAction::MODE_MATH,
                //'resultMultiplier' => 5,
                //'lines' => 5,
                //'density' => 10,
                //'height' => 50,
                //'width' => 150,
            ],
        ];
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
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

        $pageOne = Page::find()->where(['status' => 1, 'homepage' => 1, 'position' => 2])->orderBy('number asc, id desc')->asArray()->one();
        $page = Page::findOne(['id' => 2]);
        //        echo $page;

        $bacsi = Bacsi::find()->orderBy('number asc, id desc')->asArray()->all();
        $chinhanh = Chinhanh::find()->orderBy('number asc, id desc')->asArray()->all();
        $dichvus = Postscat::find()->where(['status' => 1, 'homepage' => 1, 'id' => 16])->orderBy('number asc, id desc')->one();
        $camnang = Postscat::find()->where(['status' => 1, 'homepage' => 1, 'id' => 23])->orderBy('number asc, id desc')->one();
        $tintucs = Postscat::find()->where(['status' => 1, 'id' => 24])->orderBy('number asc, id desc')->one();
        $duannoibat = Postscat::find()->where(['status' => 1, 'id' => 23])->orderBy('number asc, id desc')->one();
        $visaos = Camket::find()->orderBy('number asc, id desc')->all();
        $camnhan = Camnhan::find()->orderBy('number asc, id desc')->all();
        $video = Videos::find()->where(['status' => 1])->orderBy('number asc, id desc')->one();

        $categories = Categorys::find()->where(['status' => 1])->all();
        if ($this->isMobile) {
            return $this->render('index_m', ['dichvus' => $dichvus, 'camnang' => $camnang, 'visaos' => $visaos, 'camnhan' => $camnhan, 'pageOne' => $pageOne, 'bacsi' => $bacsi, 'chinhanh' => $chinhanh, 'video' => $video, 'tintucs' => $tintucs, 'duannoibat' => $duannoibat]);
        } else {
            return $this->render('index', ['dichvus' => $dichvus, 'camnang' => $camnang, 'visaos' => $visaos, 'camnhan' => $camnhan, 'pageOne' => $pageOne, 'bacsi' => $bacsi, 'chinhanh' => $chinhanh, 'video' => $video, 'tintucs' => $tintucs, 'duannoibat' => $duannoibat, 'categories' => $categories]);
        }
    }

    public function actionDangkyhen()
    {
        $model = new Khachhang();
        $model->fullname = $_POST['namedhbs'];
        $model->phone = $_POST['phonedhbs'];
        $model->email = $_POST['emaildhbs'];
        $model->bacsi = $_POST['bacsidh'];
        $model->phongkham = $_POST['chinhanhdh'];
        $model->thoigian = $_POST['timedhbs'];
        $model->content = $_POST['noidungdhbs'];
        $model->created_date = date('Y-m-d H:i:s', time());
        $model->status = 0;
        if ($model->save() && $model->sendEmail($this->website['email'])) {
            return 1;
        } else {
            return 0;
        }
    }

    public function actionDangky()
    {
        $model = new Baogia();
        $model->fullname = $_POST['namedk'];
        $model->phone = $_POST['phonedk'];
        $model->email = $_POST['emaildk'];
        $model->thoigian = $_POST['timedk'];
        $model->content = $_POST['noidungdk'];
        $model->created_date = date('Y-m-d H:i:s', time());
        $model->status = 0;
        if ($model->save() && $model->sendEmail($this->website['email'])) {
            return 1;
        } else {
            return 0;
        }
    }

    public function actionShowdv()
    {
        $model = \backend\models\Posts::find()->where(['id' => $_POST['id']])->one();
        return $this->renderAjax('content', ['model' => $model]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail($this->website['email'])) {
                Yii::$app->session->setFlash('success', [['Thông báo', 'Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ phản hồi sớm nhất có thể.']]);
            } else {
                Yii::$app->session->setFlash('error', [['Cảnh báo', 'Đã có lỗi trong việc gửi E-mail của bạn. Hãy thử lại sau!']]);
            }

            return $this->refresh();
        } else {
            if ($this->isMobile) {
                return $this->render('contact_m', [
                    'model' => $model,
                ]);
            } else {
                return $this->render('contact', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        $authItems = AuthItem::find()->all();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'authItems' => $authItems,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', [['Thông báo', 'Check your email for further instructions.']]);

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', [['Cảnh báo', 'Sorry, we are unable to reset password for the provided email address.']]);
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash([['Thông báo', 'success', 'New password saved.']]);

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
