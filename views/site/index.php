<?php
use app\components\HomeProductsWidget;
$this->title = Yii::$app->name;
?>
<div id="site-index">
    <div class="clearboth">
        <div class="cate-img pull-left">
            <img src="/img/cate-1.jpg" alt="" class="display-block">
        </div>
        <div class="products pull-right">
            <?= HomeProductsWidget::widget() ?>
        </div>
    </div>
    <a href="#"><img src="/img/ads-1.jpg" alt="" class="display-block"></a>
    <div class="clearboth">
        <div class="cate-img pull-left">
            <img src="/img/cate-2.jpg" alt="" class="display-block">
        </div>
        <div class="products pull-right">
            <?= HomeProductsWidget::widget(['id' => 2]) ?>
        </div>
    </div>
</div>
