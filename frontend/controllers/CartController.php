<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Html;
use frontend\components\MyController;
use backend\models\Products;
use backend\models\Customers;
use backend\models\Orders;
use frontend\components\OpenGraph;
use frontend\components\MetaTags;

class CartController extends MyController {

    /**
     * @var \devanych\cart\Cart $cart
     */
    private $cart;

    public function __construct($id, $module, $config = []) {
        parent::__construct($id, $module, $config);
        $this->cart = Yii::$app->cart;
    }

    public function actionIndex() {
        MetaTags::generate(
                [
                    'keywords' => $this->website['keyword'],
                    'description' => $this->website['description'],
                    'twitter:card' => 'summary',
                ]
        );
        OpenGraph::generate(
                [
                    'og:site_name' => $this->website['name_' . \Yii::$app->language],
                    'og:title' => $this->website['title'],
                    'og:description' => $this->website['description'],
                    'og:type' => 'website',
                    'og:image' => \Yii::$app->request->hostInfo . $this->website['logo'],
                    'og:url' => \Yii::$app->request->hostInfo,
                ]
        );
        if ($this->isMobile) {
            return $this->render('index_m', [
                        'cart' => $this->cart,
            ]);
        } else {
            return $this->render('index', [
                        'cart' => $this->cart,
            ]);
        }
    }

    public function actionAdd($id, $qty = 1) {
        try {
            $product = $this->getProduct($id);
//            $quantity = $this->getQuantity($qty, $product->quantity);
            $quantity = (int) $qty > 0 ? (int) $qty : 1;
            if ($item = $this->cart->getItem($product->id)) {
                $this->cart->plus($item->getId(), $quantity);
            } else {
                $this->cart->add($product, $quantity);
            }
            Yii::$app->session->setFlash('success', [['Thông báo', "Sản phẩm đã được thêm vào giỏ hàng."]]);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', [['Cảnh báo', $e->getMessage()]]);
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionAddcart() {
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        try {
            $product = $this->getProduct($id);
//            $quantity = $this->getQuantity($qty, $product->quantity);
            $quantity = (int) $qty > 0 ? (int) $qty : 1;
            if ($item = $this->cart->getItem($product->id)) {
                $this->cart->plus($item->getId(), $quantity);
            } else {
                $this->cart->add($product, $quantity);
            }
            Yii::$app->session->setFlash('success', [['Thông báo', "Sản phẩm đã được thêm vào giỏ hàng."]]);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', [['Cảnh báo', $e->getMessage()]]);
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionBuynow() {
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        try {
            $product = $this->getProduct($id);
//            $quantity = $this->getQuantity($qty, $product->quantity);
            $quantity = (int) $qty > 0 ? (int) $qty : 1;
            if ($item = $this->cart->getItem($product->id)) {
                $this->cart->plus($item->getId(), $quantity);
            } else {
                $this->cart->add($product, $quantity);
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', [['Cảnh báo', $e->getMessage()]]);
        }
        return $this->redirect(['index']);
    }

    public function actionChange($id, $qty = 1) {
        try {
            $product = $this->getProduct($id);
//            $quantity = $this->getQuantity($qty, $product->quantity);
            $quantity = (int) $qty > 0 ? (int) $qty : 1;
            if ($item = $this->cart->getItem($product->id)) {
                $this->cart->change($item->getId(), $quantity);
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', [['Cảnh báo', $e->getMessage()]]);
        }
        return $this->redirect(['index']);
    }

    public function actionRemove($id) {
        try {
            $product = $this->getProduct($id);
            $this->cart->remove($product->id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', [['Cảnh báo', $e->getMessage()]]);
        }
        return $this->redirect(['index']);
    }

    public function actionClear() {
        $this->cart->clear();
        return $this->redirect(['index']);
    }

    /**
     * @param integer $id
     * @return Product the loaded model
     * @throws \DomainException if the product cannot be found
     */
    private function getProduct($id) {
        if (($product = Products::findOne((int) $id)) !== null) {
            return $product;
        }
        throw new \DomainException('Không tìm thấy sản phẩm');
    }

    /**
     * @param integer $qty
     * @param integer $maxQty
     * @return integer
     * @throws \DomainException if the product cannot be found
     */
    private function getQuantity($qty, $maxQty) {
        $quantity = (int) $qty > 0 ? (int) $qty : 1;
        if ($quantity > $maxQty) {
            throw new \DomainException('Mặt hàng này trong kho còn (' . Html::encode($maxQty) . ' sản phẩm). Vui lòng chọn sản phẩm khác');
        }
        return $quantity;
    }

    public function actionOrder() {
        $model = new Customers();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                if (!empty($cartItems = $this->cart->getItems())) {
                    foreach ($cartItems as $item) {
                        $product = $item->getProduct();
                        $orders = new Orders();
                        $orders->customer_id = $model->id;
                        $orders->product_id = $product->id;
                        $orders->product_name = $product['name_' . Yii::$app->language];
                        $orders->product_image = $product->image;
                        if ($item->getPricePromotion()) {
                            $orders->product_price = $item->getPricePromotion();
                        } else {
                            $orders->product_price = $item->getPrice();
                        }
                        $orders->product_quantity = $item->getQuantity();
                        $orders->product_cost = $item->getCost();
                        $orders->save();
                    }
                    $this->sendEmail($cartItems, $model);
                }
                $this->cart->clear();
                Yii::$app->session->setFlash('success', [['Thông báo', "Đơn hàng của bạn đã gửi thành công. Chúng tôi sẽ phản hồi sớm nhất. Cảm ơn!"]]);
                return $this->goHome();
            }
        }
        if ($this->isMobile) {
            return $this->render('form_m', [
                        'model' => $model,
            ]);
        } else {
            return $this->render('form', [
                        'model' => $model,
            ]);
        }
    }

    private function sendEmail($cartItems, $model) {
        $cart = Yii::$app->cart;
        $message = '<html><body>';
        $message .= '<div style="margin-bottom: 20px; text-align: center;">';
        $message .= '<div style="margin: 10px 0;"><div>' . Html::a(Html::img(\Yii::$app->request->hostInfo . \Yii::$app->MyComponent->website['logo'], ['alt' => 'logo', 'style' => 'max-width:100%;']), \Yii::$app->request->hostInfo) . '</div></div>';
        $message .= '<div style="font-size: 30px;color: #f40000;margin-bottom: 10px;font-weight: bold;">' . \Yii::$app->MyComponent->website['name_' . \Yii::$app->language] . '</div>';
        $message .= '<div style="font-size: 20px;color: blue;">Chúng tôi chân thành cảm ơn Quý khách đã tin tưởng và ủng hộ.</div>';
        $message .= '</div>';
        $message .= '<div style="font-size: 20px;color: red;font-weight:bold;margin-bottom:10px;">Dưới đây là thông tin đơn hàng của Quý khách:</div>';
        $message .= '<div style="margin-bottom: 20px;">';
        $message .= '<div><strong>Họ tên: </strong>' . $model->name . '</div>';
        $message .= '<div><strong>Email: </strong>' . $model->email . '</div>';
        $message .= '<div><strong>Điện thoại: </strong>' . $model->phone . '</div>';
        $message .= '<div><strong>Địa chỉ nhận hàng: </strong>' . $model->address . '</div>';
        $message .= '<div><strong>Ghi chú: </strong>' . $model->body . '</div>';
        $message .= '<div><strong>Ngày đặt hàng: </strong>' . date_format(date_create($model->created_date), 'd/m/Y') . '</div>';
        $message .= '</div>';
        $message .= '<div style="padding: 15px;border: 3px solid #a1232e;">';
        $message .= '<div style="min-height: 0.01%;overflow-x: auto;">';
        $message .= '<table style="width: 100%;max-width: 100%;margin-bottom: 20px;background-color: transparent;border-collapse: collapse;border-spacing: 0;">';
        $message .= '<thead>';
        $message .= '<tr>';
        $message .= '<th style="padding: 8px;line-height: 1.42857143;text-align: left;vertical-align: bottom;border-bottom: 2px solid #ddd;background-color: #f5f5f5;border-top: 0;">Hình ảnh</th>';
        $message .= '<th style="padding: 8px;line-height: 1.42857143;text-align: left;vertical-align: bottom;border-bottom: 2px solid #ddd;background-color: #f5f5f5;border-top: 0;">Tên sản phẩm</th>';
        $message .= '<th style="padding: 8px;line-height: 1.42857143;text-align: left;vertical-align: bottom;border-bottom: 2px solid #ddd;background-color: #f5f5f5;border-top: 0;">Số lượng</th>';
        $message .= '<th style="padding: 8px;line-height: 1.42857143;text-align: left;vertical-align: bottom;border-bottom: 2px solid #ddd;background-color: #f5f5f5;border-top: 0;">Giá</th>';
        $message .= '<th style="padding: 8px;line-height: 1.42857143;text-align: left;vertical-align: bottom;border-bottom: 2px solid #ddd;background-color: #f5f5f5;border-top: 0;">Thành tiền</th>';
        $message .= '</tr>';
        $message .= '</thead>';
        $message .= '<tbody>';
        foreach ($cartItems as $item) {
            $product = $item->getProduct();
            $message .= '<tr>';
            $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">' . Html::img(\Yii::$app->request->hostInfo . $product->image, ['alt' => $product['name_' . \Yii::$app->language], 'width' => 50]) . '</td>';
            $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;"><a href="' . \Yii::$app->request->hostInfo . \Yii::$app->urlManager->createUrl('/chi-tiet-san-pham/' . $product->slug) . '">' . $product['name_' . \Yii::$app->language] . '</a></td>';
            $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">' . $item->getQuantity() . '</td>';
            $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">';
            if ($item->getPricePromotion()) {
                $message .= number_format($item->getPricePromotion()) . ' vnđ';
            } else {
                $message .= number_format($item->getPrice()) . ' vnđ';
            }
            $message .= '</td>';
            $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;">' . number_format($item->getCost()) . ' vnđ</td>';
            $message .= '</tr>';
        }
        $message .= '<tr>';
        $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #f5f5f5;"></td>';
        $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #f5f5f5;" colspan="2"><strong>Tổng số:</strong></td>';
        $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #f5f5f5;" colspan="2"><strong>' . $cart->getTotalCount() . '</strong></td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #f5f5f5;"></td>';
        $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #f5f5f5;" colspan="2"><strong>Tổng tiền:</strong></td>';
        $message .= '<td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #f5f5f5;" colspan="2"><strong>' . number_format($cart->getTotalCost()) . ' vnđ</strong></td>';
        $message .= '</tr>';
        $message .= '</tbody>';
        $message .= '</table>';
        $message .= '</div>';
        $message .= '</div>';
        $message .= '<div style="font-size: 20px;color: blue;margin: 20px 0;">Chúng tôi sẽ liên hệ và gửi hàng cho Quý khách trong thời gian sớm nhất. Chân thành cảm ơn!</div>';
        $message .= "</body></html>";
        return \Yii::$app->mailer->compose()
                        ->setTo($model->email)
                        ->setBcc(\Yii::$app->MyComponent->website['email'])
                        ->setFrom([\Yii::$app->MyComponent->website['email'] => \Yii::$app->MyComponent->website['name_' . Yii::$app->language]])
                        ->setSubject('Thông tin đơn hàng từ website ' . \Yii::$app->request->hostInfo)
                        ->setHtmlBody($message)
                        ->setReplyTo(\Yii::$app->MyComponent->website['email'])
                        ->send();
    }

}
