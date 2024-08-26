<?php

namespace frontend\controllers;

use Yii;
use backend\models\Categorys;
use yii\web\Controller;
use backend\models\Products;

class CategoryController extends Controller
{
  public $layout = 'desktop/main'; // Đảm bảo layout là 'main' hoặc không ghi đè layout
  public function actionIndex()
  {
    $categories = Categorys::find()->where(['status' => 1])->all();
    // print_r($categories);
    return $this->render('index', ['categories' => $categories]);
  }

  public function actionView($id)
  {
    // $category = Categorys::findOne($id);
    // print_r($category);
    // return $this->render('view', ['category' => $category]);
    $products = Products::find()->where(['parent' => $id, 'status' => 1])->all();
    // print_r($products);
    return $this->render('view', ['products' => $products]);
  }
}
