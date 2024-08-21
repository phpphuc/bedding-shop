<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
   // 'bootstrap' => ['log', 'assetsAutoCompress'],
    'homeUrl' => '/',
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
//            'modelMap' => [
//                'RegistrationForm' => 'frontend\models\RegistrationForm',
//                'Profile' => 'frontend\models\Profile',
//            ],
            'controllerMap' => [
                'registration' => [
                    'class' => \dektrium\user\controllers\RegistrationController::className(),
                    'on ' . \dektrium\user\controllers\RegistrationController::EVENT_AFTER_REGISTER => function ($e) {
                        Yii::$app->response->redirect(array('/user/security/login'))->send();
                        Yii::$app->end();
                    },
                    'on ' . \dektrium\user\controllers\RegistrationController::EVENT_AFTER_CONFIRM => function ($e) {
                        Yii::$app->response->redirect(array('/user/settings/profile'))->send();
                        Yii::$app->end();
                    }
                ],
            ],
        ],
        'newsletter' => \ymaker\newsletter\frontend\Module::class,
        'robotsTxt' => [
            'class' => 'execut\robotsTxt\Module',
            'components' => [
                'generator' => [
                    'class' => \execut\robotsTxt\Generator::class,
//                    'sitemap' => [
//                        '/sitemap/index',
//                    ],
                    'sitemap' => 'http' . (empty($_SERVER['HTTPS']) ? '' : 's') . '://' . $_SERVER['HTTP_HOST'] . '/sitemap.xml',
                    'userAgent' => [
                        '*' => [
                            'Disallow' => [
//                                'noIndexedHtmlFile.html',
//                                [
//                                    'notIndexedModule/noIndexedController/noIndexedAction',
//                                    'noIndexedActionParam' => 'noIndexedActionParamValue',
//                                ]
                                '/backend/',
                            ],
                            'Allow' => [
                                '/backend/web/uploads/',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authClientCollection' => [
            'class' => \yii\authclient\Collection::className(),
            'clients' => [
//                'facebook' => [
//                    'class' => 'dektrium\user\clients\Facebook',
//                    'clientId' => '707869099689049',
//                    'clientSecret' => 'a3b4bd2362093e2fbac51685ec362dfc',
//                ],
//                'google' => [
//                    'class' => 'dektrium\user\clients\Google',
//                    'clientId' => '569773122827-mp79c8bh4p98e09lmu8aufonoptjhh83.apps.googleusercontent.com',
//                    'clientSecret' => 'cvcGX-pQu9PJ_8-h2Nr4UWuH',
//                ],
            ],
        ],
        'socialShare' => [
            'class' => \ymaker\social\share\configurators\Configurator::class,
            'socialNetworks' => [
                'facebook' => [
                    'class' => \ymaker\social\share\drivers\Facebook::class,
                    'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fab fa-facebook-square']),
                ],
                'twitter' => [
                    'class' => \ymaker\social\share\drivers\Twitter::class,
                    'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fab fa-twitter-square']),
                ],
                'googlePlus' => [
                    'class' => \ymaker\social\share\drivers\GooglePlus::class,
                    'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fab fa-google-plus-square']),
                ],
                'linkedIn' => [
                    'class' => \ymaker\social\share\drivers\LinkedIn::class,
                    'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fab fa-linkedin']),
                ],
                'gmail' => [
                    'class' => \ymaker\social\share\drivers\Gmail::class,
                    'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fas fa-envelope-square']),
                ],
                'pinterest' => [
                    'class' => \ymaker\social\share\drivers\Pinterest::class,
                    'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fab fa-pinterest-square']),
                ],
            ],
        ],
        'thumbnailer' => [
            'class' => 'daxslab\thumbnailer\Thumbnailer',
            //'enableCaching' => TRUE,
        ],
        'userCounter' => [
            'class' => 'frontend\components\UserCounter',
            'tableUsers' => 'pcounter_users',
            'tableSave' => 'pcounter_save',
            'autoInstallTables' => true,
            'onlineTime' => 10, // min
        ],
        'mobileDetect' => [
            'class' => '\skeeks\yii2\mobiledetect\MobileDetect'
        ],
       // 'assetsAutoCompress' => [
       //     'class'   => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
       //     'enabled' => false,

       //     'readFileTimeout' => 3,           //Time in seconds for reading each asset file

       //     'jsCompress'                => true,        //Enable minification js in html code
       //     'jsCompressFlaggedComments' => false,        //Cut comments during processing js

       //     'cssCompress' => true,        //Enable minification css in html code

       //     'cssFileCompile'        => true,        //Turning association css files
       //     'cssFileRemouteCompile' => false,       //Trying to get css files to which the specified path as the remote file, skchat him to her.
       //     'cssFileCompress'       => true,        //Enable compression and processing before being stored in the css file
       //     'cssFileBottom'         => false,       //Moving down the page css files
       //     'cssFileBottomLoadOnJs' => false,       //Transfer css file down the page and uploading them using js

       //     'jsFileCompile'                 => true,        //Turning association js files
       //     'jsFileRemouteCompile'          => false,       //Trying to get a js files to which the specified path as the remote file, skchat him to her.
       //     'jsFileCompress'                => true,        //Enable compression and processing js before saving a file
       //     'jsFileCompressFlaggedComments' => true,        //Cut comments during processing js

       //     'noIncludeJsFilesOnPjax' => true,        //Do not connect the js files when all pjax requests

       //     'htmlFormatter' => [
       //         //Enable compression html
       //         'class'         => 'skeeks\yii2\assetsAuto\formatters\html\TylerHtmlCompressor',
       //         'extra'         => true,       //use more compact algorithm
       //         'noComments'    => true,        //cut all the html comments
       //         'maxNumberRows' => 50000,       //The maximum number of rows that the formatter runs on
       //     ],
       // ],
       // 'assetManager' => [
       //     'appendTimestamp' => true,
       // ],
        'cart' => [
            'class' => 'devanych\cart\Cart',
            'storageClass' => 'devanych\cart\storage\SessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'cart',
                'expire' => 604800,
                'productClass' => 'backend\models\Products',
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
                'productFieldPricePromotion' => 'price_promotion',
            ],
        ],
        'request' => [
            'cookieValidationKey' => '[hSygpwS7UzfaD0nNH8Kn]',
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
//        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'MyComponent' => [
            'class' => 'frontend\components\MyComponent',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                ['pattern' => 'sitemap', 'route' => 'sitemap/index', 'suffix' => '.xml'],
                ['pattern' => 'robots', 'route' => 'robotsTxt/web/index', 'suffix' => '.txt'],
//                'rating' => 'products/rating',
//                'san-pham' => 'products/index',
//                'san-pham-sale' => 'products/sale',
//                'san-pham/<slug>' => 'products/cate',
//                'chi-tiet-san-pham/<slug>' => 'products/view',
//                'tag/<tag>' => 'products/tag',
               'video-clip' => 'videos/index',
                'bai-viet/<slug>' => 'page/index',
                'danh-muc/<slug>' => 'posts/index',
                'chi-tiet-bai-viet/<slug>' => 'posts/view',
                'tag-post/<tag>' => 'posts/tag',
                'lien-he' => 'site/contact',
               'thu-vien' => 'thuvien/index',
               'thu-vien/<slug>' => 'thuvien/view',
                'gio-hang' => 'cart/index',
                'changelanguage' => 'site/language',
            ],
        ],
    ],
    'as beforeRequest' => [
        'class' => 'frontend\components\CheckIfChangeLang',
    ],
    'params' => $params,
];
