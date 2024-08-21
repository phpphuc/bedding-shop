<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Thanh toán đơn hàng';
$cart = Yii::$app->cart;
?>
<div class="clearfix margin-bottom-20"></div>
<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>">Trang chủ</a>
                <a class="mybreadcrumb__step" href="javascript:;">Thanh toán</a>
            </div>
            <div class="clearfix margin-bottom-30"></div>
        </div>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'customers-form']); ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-left-0 padding-right-0 wow fadeInLeft">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'address')->textInput() ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?= $form->field($model, 'body')->textarea(['rows' => 2]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Gửi đơn hàng', ['class' => 'btn _btn-pink']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 wow fadeInRight">
            <div class="_boxdh">
                <?php if (!empty($cartItems = $cart->getItems())): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="active">
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cartItems as $item):
                                    $product = $item->getProduct();
                                    ?>
                                    <tr>
                                        <td><?= Html::img("@web{$product->image}", ['alt' => $product['name_' . Yii::$app->language], 'width' => 50]) ?></td>
                                        <td><a href="<?= Yii::$app->urlManager->createUrl('chi-tiet-san-pham/' . $product->slug) ?>"><?= $product['name_' . Yii::$app->language] ?></a></td>
                                        <td><?= $item->getQuantity() ?></td>
                                        <td><?php
                                            if ($item->getPricePromotion()) {
                                                echo number_format($item->getPricePromotion()) . ' vnđ';
                                            } else {
                                                echo number_format($item->getPrice()) . ' vnđ';
                                            }
                                            ?>
                                        </td>
                                        <td><?= number_format($item->getCost()); ?> vnđ</td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="active">
                                    <td></td>
                                    <td colspan="2"><strong>Tổng số:</strong></td>
                                    <td colspan="2"><strong><?= $cart->getTotalCount() ?></strong></td>
                                </tr>
                                <tr class="active">
                                    <td></td>
                                    <td colspan="2"><strong>Tổng tiền:</strong></td>
                                    <td colspan="2"><strong><?= number_format($cart->getTotalCost()); ?> vnđ</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix margin-bottom-20"></div>
                    <div class="text-right">
                        <ul class="list-inline">
                            <li><?= Html::a('Chỉnh sửa đơn hàng', Yii::$app->urlManager->createUrl('/gio-hang'), ['class' => 'btn _btn-red']) ?></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>