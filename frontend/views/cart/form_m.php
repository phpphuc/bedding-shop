<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Thanh toán đơn hàng';
$cart = Yii::$app->cart;
?>

<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-md-12">
                <div class="mybreadcrumb">
                    <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app', 'Home'); ?></a>
                    <a class="mybreadcrumb__step" href="javascript:;"><span>Thanh toán đơn hàng</span></a>
                </div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'customers-form']); ?>
        <div class="row">
            <div class="col-xs-12 wow fadeInDown">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'address')->textInput() ?>
                <?= $form->field($model, 'body')->textarea(['rows' => 3]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Gửi đơn hàng', ['class' => 'btn _btn-pink']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <div class="clearfix margin-bottom-30"></div>
        <div class="_boxdh">
            <div class="row">
                <?php if (!empty($cartItems = $cart->getItems())): ?>
                    <?php
                    foreach ($cartItems as $item):
                        $product = $item->getProduct();
                        if ($product['price_promotion']) {
                            $price = $product['price_promotion'];
                        } else {
                            $price = $product['price'];
                        }
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 padding-left-0">
                            <div><?= Html::img("@web{$product->image}", ['alt' => $product['name_' . Yii::$app->language], 'style' => 'width: 100%;']) ?></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 padding-left-0">
                            <div><strong><?= $product['name_' . Yii::$app->language] ?></strong></div>
                            <div>Số lượng:  <strong><?= $item->getQuantity() ?></strong></div>
                            <div>Đơn giá: <strong><?= number_format($price); ?> vnđ</strong></div>
                            <div>Thành tiền: <strong><?= number_format($item->getCost()); ?> vnđ</strong></div>
                        </div>
                        <div class="clearfix margin-bottom-10"></div>
                    <?php endforeach; ?>
                    <div class="col-md-12">
                        <div>
                            <div><strong>Tổng số: <?= $cart->getTotalCount() ?></strong></div>
                        </div>
                        <div>
                            <div><strong>Tổng tiền: <?= number_format($cart->getTotalCost()); ?> vnđ</strong></div>
                        </div>
                    </div>
                    <div class="clearfix margin-bottom-20"></div>
                    <div class="col-md-12">
                        <div class="text-right">
                            <ul class="list-inline">
                                <li><?= Html::a('Chỉnh sửa đơn hàng', Yii::$app->urlManager->createUrl('/gio-hang'), ['class' => 'btn _btn-red']) ?></li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-12">
                        <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix margin-bottom-20"></div>
