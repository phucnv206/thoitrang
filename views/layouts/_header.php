<?php

use app\components\LogoWidget;
?>
<header>
    <div class="top-menu">
        <div class="wrapper">
            <div class="container clearboth">
                <ul class="pull-right">
                    <li><a href="#">Tài khoản của tôi</a></li>
                    <li><a href="#">Quản lý đơn hàng</a></li>
                    <li><a href="#">Danh sách ưa thích</a></li>
                    <li><a href="#">Giỏ hàng</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                    <li><a href="#">Đăng ký</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container clearboth">
        <div id="logo" class="pull-left">
            <div class="wrapper">
                <a href="<?= Yii::$app->homeUrl ?>">
                    <img src="<?= LogoWidget::widget() ?>" alt="<?= Yii::$app->name ?>">
                </a>
            </div>
        </div>
        <div class="pull-right">
            <div class="clearboth">
                <div class="pull-left" id="policy"><div class="wrapper"><img src="/img/policy.png" alt=""></div></div>
                <div class="pull-right padding-left-30" id="cart-btn">
                    <div class="wrapper"><a href="#" class="text-14 text-black">Giỏ hàng ( 0 ) <img src="/img/cart-icon.png" class="v-middle" alt=""></a></div>
                </div>
            </div>
        </div>
    </div>
</header>