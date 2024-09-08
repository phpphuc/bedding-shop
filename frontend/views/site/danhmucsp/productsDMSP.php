<?php

use backend\models\Categorys;
use backend\models\Products;
use yii\helpers\Url;

$cateHome = Categorys::find()->where(['status' => 1, 'id' => 36])->orderBy('number asc, id desc')->all();
if ($cateHome) {
  $stt = 0;
  $defaultPageSize = 4;
  foreach ($cateHome as $keyDM => $valueDM) {
    $stt++;
    $modelID = $valueDM['id'];
    $nameDM = $valueDM['name_' . Yii::$app->language];
    $linkDM = Yii::$app->urlManager->createUrl('/san-pham/' . $valueDM['slug']);
    $imgDM = $valueDM['image'];
    $desDM = $valueDM['des_' . Yii::$app->language];
    $model = new Categorys();

    $modelCategory = $model->getCateChild($modelID);
    if ($modelCategory) {
      $query = Products::find()->where('status =1 and parent IN (' . implode(',', $modelCategory) . ')');
      $countQuery = clone $query;
      $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $defaultPageSize]);
      $products = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->orderBy('number asc, id desc')
        ->all();
    } else {

      $query = Products::find()->where('status =1 and parent = ' . $modelID);
      $countQuery = clone $query;
      $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $defaultPageSize]);
      $products = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->orderBy('number asc, id desc')
        ->all();
    }
?>

    <div>
      <div class="container mx-auto">
        <h2 class="text-center font-utm-avo text-3xl font-bold text-pink-500"><?= $nameDM ?></h2>
        <div class="decoration my-2">
          <img src="../images/products-decoration.png" alt="Decoration" class="mx-auto" />
        </div>


        <?php
        if ($products) {
          $stt2 = 0;
        ?>
          <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
            <?php
            foreach ($products as $keyM => $valueP) {
              $stt2++;
              $linkP = Yii::$app->urlManager->createUrl('/chi-tiet-san-pham/' . $valueP['slug']);
              $nameP = $valueP['name_' . Yii::$app->language];
              $img = $valueP['image'];
              $price = $valueP['price'];
              $price_promotion = $valueP['price_promotion'];
            ?>


              <div class="overflow-hidden rounded-lg border border-[#ededed] bg-white">
                <img src="<?= $img ?>" alt="<?= $nameP ?>" class="h-48 w-full border-b border-[#ededed] object-cover p-2" />
                <div class="p-4 text-center">
                  <h3 class="mb-2 font-roboto text-xl font-bold text-gray-900"><?= $nameP ?></h3>
                  <p class="font-roboto">
                    Giá:
                    <span class="font-roboto font-bold text-red-600"><?= $price ? number_format($price) : 'LIÊN HỆ' ?></span>
                  </p>
                </div>
              </div>

          <?php

            }
          }
          ?>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <?=
          yii\widgets\LinkPager::widget([
            'pagination' => $pages,
          ]);
          ?>
        </div>
      </div>
    </div>
    <div class="clearfix margin-bottom-30"></div>
<?php
  }
}
?>