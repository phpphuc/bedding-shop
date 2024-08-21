<?php

/**
 * Sitemap
 */

namespace frontend\controllers;

use \mrssoft\sitemap\Sitemap;
use backend\models\Page;
use backend\models\Categorys;
use backend\models\Postscat;
use backend\models\Products;
use backend\models\Posts;

class SitemapController extends \mrssoft\sitemap\SitemapController {

    /**
     * @var int Cache duration, set null to disabled
     */
    protected $cacheDuration = 43200; // default 12 hour

    /**
     * @var string Cache filename
     */
    protected $cacheFilename = 'sitemap.xml';

    public function models() {
        return [
//            [
//                'class' => Categorys::className(),
//                'change' => Sitemap::DAILY,
//                'priority' => 0.8,
//                'lastmod' => 'created_date',
//            ],
            [
                'class' => Postscat::className(),
                'change' => Sitemap::DAILY,
                'priority' => 0.8,
                'lastmod' => 'created_date',
            ],
//            [
//                'class' => Products::className(),
//                'change' => Sitemap::DAILY,
//                'priority' => 0.64,
//                'lastmod' => 'created_date',
//            ],
            [
                'class' => Posts::className(),
                'change' => Sitemap::DAILY,
                'priority' => 0.64,
                'lastmod' => 'created_date',
            ],
            [
                'class' => Page::className(),
                'change' => Sitemap::DAILY,
                'priority' => 0.64,
                'lastmod' => 'created_date',
            ],
        ];
    }

    public function urls() {
        return [
            [
                'url' => 'site/contact',
                'change' => Sitemap::DAILY,
                'priority' => 1.0
            ],
//            [
//                'url' => 'products/index',
//                'change' => Sitemap::DAILY,
//                'priority' => 1.0
//            ],
        ];
    }

}
