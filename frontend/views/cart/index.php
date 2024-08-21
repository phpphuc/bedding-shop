<?php
/* @var $this yii\web\View */
/* @var $cart \devanych\cart\Cart */
/* @var $item \devanych\cart\CartItem */

$this->title = 'Giỏ hàng';

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="clearfix margin-bottom-20"></div>
<div class="pagewrap">
    <div class="row">
        <div class="col-md-12">
            <div class="mybreadcrumb">
                <a class="mybreadcrumb__step mybreadcrumb__step--active" href="<?= Yii::$app->homeUrl; ?>">Trang chủ</a>
                <a class="mybreadcrumb__step" href="javascript:;">Giỏ hàng</a>
            </div>
            <div class="clearfix margin-bottom-20"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if (!empty($cartItems = $cart->getItems())): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="active">
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
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
                                    <td><a class="text-success" href="<?= Url::to(['cart/change', 'id' => $item->getId(), 'qty' => $item->getQuantity() - 1]) ?>" title="Giảm số lượng"><i style="font-size: 16px;" class="fas fa-minus-square"></i></a> <?= $item->getQuantity() ?> <a class="text-success" href="<?= Url::to(['cart/change', 'id' => $item->getId(), 'qty' => $item->getQuantity() + 1]) ?>" title="Thêm số lượng"><i style="font-size: 16px;" class="fas fa-plus-square"></i></a></td>
                                    <td><?php
                                        if ($item->getPricePromotion()) {
                                            echo number_format($item->getPricePromotion());
                                        } else {
                                            echo number_format($item->getPrice());
                                        }
                                        ?>
                                    </td>
                                    <td><?= number_format($item->getCost()); ?></td>
                                    <td><a class="text-danger" href="<?= Url::to(['cart/remove', 'id' => $item->getId()]) ?>"><i style="font-size: 16px;" class="fas fa-times-circle"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="active">
                                <td colspan="2"></td>
                                <td colspan="2"><strong>Tổng số:</strong></td>
                                <td colspan="2"><strong><?= $cart->getTotalCount() ?></strong></td>
                            </tr>
                            <tr class="active">
                                <td colspan="2"></td>
                                <td colspan="2"><strong>Tổng tiền:</strong></td>
                                <td colspan="2"><strong><?= number_format($cart->getTotalCost()); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="clearfix margin-bottom-20"></div>
                <div class="text-right">
                    <ul class="list-inline">
                        <li><?= Html::a('Tiếp tục mua hàng', Yii::$app->homeUrl, ['class' => 'btn _btn-pink']) ?></li>
                        <li><?= Html::a('Tiến hành thanh toán', ['cart/order'], ['class' => 'btn _btn-red']) ?></li>
                    </ul>
                </div>
            <?php else: ?>
                <h3>Không có sản phẩm nào trong giỏ hàng</h3>
            <?php endif; ?>
        </div>
    </div>
</div>