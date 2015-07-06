<?php
use app\components\Helpers;
use yii\helpers\Url;
?>

<div class="padding-25">
    <div class="text-30 text-black"><?= $category['name'] ?></div>
    <div class="text-grey margin-bottom-30"><?= $category['description'] ?></div>
    <div class="clearboth">
        <?php foreach ($products as $product): ?>
        <div class="product-item text-black">
            <a href="<?= Url::to(['product/view', 'id' => $product['id'], 'slug' => $product['slug']]) ?>">
                <img src="<?= $product['thumbnail'] ?>" alt="<?= $product['name'] ?>" class="margin-bottom-10">
            </a>
            <div class="clearboth">
                <div class="pull-left"><?= $product['sku'] ?></div>
                <div class="pull-right"><img src="img/rating.jpg" alt=""></div>
            </div>
            <div class="padding-v-10"><?= $product['name'] ?></div>
            <div class="price"><?= Helpers::formatPrice($product['price']) ?></div>
        </div>
        <?php endforeach ?>
    </div>
</div>