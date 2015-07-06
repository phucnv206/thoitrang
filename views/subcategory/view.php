<?php

use yii\helpers\Url;
use app\components\Helpers;

$this->title = $category->name;
?>
<div class="product-heading clearfix">
    <div class="pull-left margin-right-15 text-light"><?= $category->name ?></div>
    <div class="line-wrapper"><div class="line"></div></div>
</div>
<div class="row">
    <?php foreach ($products as $product): ?>
    <div class="col-sm-4 col-xs-6">
        <a href="<?= Url::to(['product/view', 'id' => $product['id'], 'slug' => $product['slug']]) ?>" class="product thumbnail">
            <img src="<?= $product['thumbnail'] ?>" alt="<?= $product['name'] ?>">
            <div class="cat"><?= $product->category->name ?></div>
            <div class="title"><?= $product['name'] ?></div>
            <div class="price text-bold"><?= Helpers::formatPrice($product['price']) ?></div>
        </a>
    </div>
    <?php endforeach ?>
</div>
<div class="text-right">
<?php echo \yii\widgets\LinkPager::widget([
    'pagination' => $pagination,
]); ?>
</div>