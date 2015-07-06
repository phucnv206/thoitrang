<?php
use app\components\WatermarkWidget;
?>
<footer>
    <div class="clearboth text-14">
        <div class="col">
            <div class="text-bold text-black">TIN TỨC</div>
            <div><a href="#">Tin tức</a></div>
            <div><a href="#">Tin thời trang</a></div>
            <div><a href="#">Thông tin khuyến mãi</a></div>
            <div><a href="#">Tuyển dụng</a></div>
        </div>
        <div class="col">
            <div class="text-bold text-black">GIÚP ĐỠ</div>
            <div><a href="#">Hướng dẫn mua hàng</a></div>
            <div><a href="#">Hệ thống cửa hàng</a></div>
            <div><a href="#">Hướng dẫn sử dụng</a></div>
            <div><a href="#">Chính sách đổi trả hàng</a></div>
        </div>
        <div class="col">
            <div class="text-bold text-black">GIỚI THIỆU</div>
            <div><a href="#">Quá trình hình thành công ty</a></div>
            <div><a href="#">Quy mô</a></div>
            <div><a href="#">Hợp tác với chúng tôi</a></div>
            <div><a href="#">Chính sách bảo mật</a></div>
        </div>
        <div class="col">
            <div class="text-italic">Đăng ký nhận tin khuyến mãi</div>
            <div class="padding-v-10">
                <div class="form-group"><input class="form-control"></div>
            </div>
            <img src="/img/social.png" alt="" class="margin-top-10">
        </div>
    </div>
</footer>
<?= WatermarkWidget::widget() ?>