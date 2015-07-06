<?php

use yii\helpers\Url;
use app\components\Helpers;

$this->title = $category['name'];
?>
<div id="category-view">
    <div class="cover"><img src="<?= $category['thumbnail'] ?>"></div>
    <div class="bg-grey">
        <div class="container bg-white">
            <div class="clearboth">
                <div class="sidebar pull-left">
                    <div class="heading"><?= $this->title ?></div>
                    <ul>
                        <?php foreach ($category['subcategories'] as $category): ?>
                        <li><a href="<?= Url::to('subcategory/view', ['id' => $category['id'], 'slug' => $category['slug']]) ?>"><?= $category['name'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="products pull-right">
                    <div class="heading">Sản phẩm mới</div>
                    <div class="clearboth">
                        <?php foreach ($products as $product): ?>
                        <div class="product-item text-black">
                            <a href="<?= Url::to(['product/view', 'id' => $product['id'], 'slug' => $product['slug']]) ?>">
                                <img src="<?= $product['thumbnail'] ?>" alt="<?= $product['name'] ?>" class="margin-bottom-10">
                            </a>
                            <div class="clearboth">
                                <div class="pull-left"><?= $product['sku'] ?></div>
                                <div class="pull-right"><img src="/img/rating.jpg" alt=""></div>
                            </div>
                            <div class="padding-v-10"><?= $product['name'] ?></div>
                            <div class="price"><?= Helpers::formatPrice($product['price']) ?></div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <?= $this->render('/layouts/_brands') ?>
        </div>
    </div>
</div>