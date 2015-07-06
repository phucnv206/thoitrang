<?php

use yii\helpers\Url;

$this->title = $category->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="postcategory-view">
    <div class="heading"><?= $this->title ?></div>
    <?php foreach ($posts as $post): ?>
    <div class="post">
        <div class="row">
            <div class="col-xs-3">
                <a href="<?= Url::to(['post/view', 'id' => $post->id, 'slug' => $post->slug]) ?>">
                    <img src="<?= $post->thumbnail ?>" alt="<?= $post->title ?>" class="img-responsive">
                </a>
            </div>
            <div class="col-xs-9">
                <div class="title"><?= $post->title ?></div>
                <div class="desc">
                    <?= $post->description ?>
                    <a href="<?= Url::to(['post/view', 'id' => $post->id, 'slug' => $post->slug]) ?>" class="view-more">xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
<div class="text-right">
<?php echo \yii\widgets\LinkPager::widget([
    'pagination' => $pagination,
]); ?>
</div>