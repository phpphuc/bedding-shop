<?php
/* @var $this yii\web\View */
/* @var $cart \devanych\cart\Cart */
/* @var $item \devanych\cart\CartItem */

$this->title = 'Giỏ hàng';

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="pagewrap">
    <div class="_box-content">
        <div class="row">
            <div class="col-md-12">
                <div class="mybreadcrumb">
                    <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>">Trang chủ</a>
                    <a class="mybreadcrumb__step" href="javascript:;"><span>Giỏ hàng</span></a>
                </div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
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
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 padding-left-10 padding-right-10">
                        <div><?= Html::img("@web{$product->image}", ['alt' => $product['name_' . Yii::$app->language], 'style' => 'width: 100%;']) ?></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 padding-left-0 padding-right-10">
                        <div><strong><?= $product['name_' . Yii::$app->language] ?></strong></div>
                        <div>Số lượng:  <a class="text-success" href="<?= Url::to(['cart/change', 'id' => $item->getId(), 'qty' => $item->getQuantity() - 1]) ?>" title="Giảm số lượng"><i style="font-size: 16px;" class="fas fa-minus-square"></i></a> <?= $item->getQuantity() ?> <a class="text-success" href="<?= Url::to(['cart/change', 'id' => $item->getId(), 'qty' => $item->getQuantity() + 1]) ?>" title="Thêm số lượng"><i style="font-size: 16px;" class="fas fa-plus-square"></i></a></div>
                        <div>Đơn giá: <strong><?= number_format($price); ?> vnđ</strong></div>
                        <div>Thành tiền: <strong><?= number_format($item->getCost()); ?> vnđ</strong></div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 padding-left-0 padding-right-10">
                        <div><a class="text-danger" href="<?= Url::to(['cart/remove', 'id' => $item->getId()]) ?>"><i style="font-size: 16px;" class="fas fa-times-circle"></i></a></div>
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
                <div class="text-right">
                    <ul class="list-inline">
                        <li><?= Html::a('Tiếp tục mua hàng', Yii::$app->homeUrl, ['class' => 'btn _btn-pink']) ?></li>
                        <li><?= Html::a('Tiến hành thanh toán', ['cart/order'], ['class' => 'btn _btn-red']) ?></li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="clearfix margin-bottom-20"></div>