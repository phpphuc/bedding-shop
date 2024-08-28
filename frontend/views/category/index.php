<?php
/* @var $this yii\web\View */
/* @var $categories app\models\Category[] */

use yii\helpers\Html;

$this->title = 'Categories';
// return;
?>
<h1>
  <?php //Html::encode($this->title)
  ?></h1>

<section class="bg-white py-8">
  <div class="container text-center">
    <div class="grid gap-y-8 sm:grid-cols-2 xl:grid-cols-4 xl:justify-center xl:gap-8">
      <?php
      foreach ($categories as $category):
        $linkSp = Yii::$app->urlManager->createUrl('/san-pham/' . $category['slug']);
      ?>
        <?php //print_r($category);
        // echo PHP_EOL;
        // echo "<br>";
        ?>
        <!-- Category Item 1 -->
        <div class="relative z-[2] mx-auto h-[272px] w-[272px] rounded-full bg-primary">
          <div class="inner-shadow absolute right-0 m-0.5 h-[258px] w-[258px] overflow-hidden rounded-full">
            <img class="img relative z-[-2] h-[258px] w-[258px] rounded-full object-cover" src="<?= $category->image; ?>" alt="" />
            <img class="absolute bottom-0 w-full" src="../images/category-wavy.png" alt="" />
            <div class="absolute bottom-[42px] w-full translate-y-1/2 text-center font-utm-avo font-bold uppercase text-primary">
              <a href="<?= $linkSp ?>"><?= $category->{'name_' . Yii::$app->language}; ?></a>
            </div>
          </div>
        </div>
      <?php endforeach;
      ?>
    </div>
  </div>
</section>
<?php //Html::a(Html::encode($category->{'name_' . Yii::$app->language}), ['view', 'id' => $category->id])
?>