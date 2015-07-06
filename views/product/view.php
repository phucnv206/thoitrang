<?php

use yii\helpers\Url;
use app\components\Helpers;
use yii\web\View;

$this->title = $product->name;
?>
<div id="product-view">
    <div class="bg-grey">
        <div class="container bg-white">
            <div class="product clearboth">
                <div class="relate pull-left">
                    <div class="heading">Sản phẩm cùng loại</div>
                    <?php foreach ($relateProducts as $rproduct): ?>
                    <div class="rproduct clearboth">
                        <div class="image pull-left"><img src="<?= $rproduct->thumbnail ?>" alt="<?= $rproduct->name ?>"></div>
                        <div class="text-14 pull-left">
                            <p><?= $rproduct->name ?></p>
                            <p class="price text-bold"><?= Helpers::formatPrice($rproduct->price) ?></p>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="detail pull-left">
                    <div class="clearboth">
                        <div class="preview pull-left">
                            <img class="active" src="<?= $product->thumbnail ?>">
                            <ul>
                                <?php foreach ($product->thumbnails as $thumbnail): ?>
                                <li><img src="<?= $thumbnail->url ?>"></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="info pull-left text-black">
                            <div class="text-uppercase"><?= $product->sku ?></div>
                            <p class="text-uppercase"><?= $product->name ?></p>
                            <div class="price text-bold"><?= Helpers::formatPrice($product->price) ?></div>
                            <table class="option">
                                <tr>
                                    <td class="quantity">
                                        <button class="down"><i class="fa fa-caret-left"></i></button>
                                        <span>1</span>
                                        <button class="up"><i class="fa fa-caret-right"></i></button>
                                    </td>
                                    <td>Màu sắc: <i class="fa fa-square" style="color: teal"></i></td>
                                    <td>Size: L</td>
                                </tr>
                            </table>
                            <button class="add-to-cart">
                                <i class="fa fa-cart-plus text-24"></i>
                                Thêm vào giỏ hàng
                            </button>
                            <button class="buy-now">
                                Mua ngay giao hàng tận nơi<br>
                                <small>(Thanh toán khi nhận hàng)</small>
                            </button>
                            <div class="sharing"><div class="addthis_native_toolbox"></div></div>
                            <div class="desc"><?= $product->description ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->render('/layouts/_brands') ?>
        </div>
    </div>
</div>
<?php
$this->registerJsFile('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-558f80370714aeba', ['position' => View::POS_BEGIN, 'async' => 'async']);
$this->registerJs("
    
", View::POS_END);
