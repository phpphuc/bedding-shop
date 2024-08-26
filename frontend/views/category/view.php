<?php
/* @var $this yii\web\View */
/* @var $category app\models\Category */
/*
use yii\helpers\Html;

// $this->title = $category->name;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php
*/
?>

<?php

use yii\helpers\Url;
?>

<!-- Products Section -->
<section class="bg-white py-8">
  <div class="container mx-auto">
    <h2 class="text-center font-utm-avo text-3xl font-bold text-pink-500">CHĂN GA</h2>
    <div class="decoration my-2">
      <img src="<?= Url::to('@web/images/products-decoration.png') ?>" alt="Decoration" class="mx-auto" />
    </div>
    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
      <?php foreach ($products as $product): ?>
        <div class="overflow-hidden rounded-lg border border-[#ededed] bg-white">
          <img src="<?= Url::to('@web' . $product->image) ?>" alt="Product Image" class="h-48 w-full border-b border-[#ededed] object-cover p-2" />
          <div class="p-4 text-center">
            <h3 class="mb-2 font-roboto text-xl font-bold text-gray-900"><?= $product->{'name_' . Yii::$app->language}; ?></h3>
            <p class="font-roboto">
              Giá:
              <span class="font-roboto font-bold text-red-600"><?= $product->price ? number_format($product->price) . ' VND' : 'LIÊN HỆ' ?></span>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Pagination -->
    <div class="mt-8 flex items-center justify-center gap-2">
      <button class="border px-3 py-1 text-gray-700">Trang đầu</button>
      <button class="border px-3 py-1 text-gray-700">Trang trước</button>
      <button class="bg-pink-500 px-3 py-1 text-white">1</button>
      <button class="border px-3 py-1 text-gray-700">2</button>
      <button class="border px-3 py-1 text-gray-700">3</button>
      <button class="border px-3 py-1 text-gray-700">4</button>
      <button class="border px-3 py-1 text-gray-700">Trang sau</button>
      <button class="border px-3 py-1 text-gray-700">Trang cuối</button>
    </div>
  </div>
</section>