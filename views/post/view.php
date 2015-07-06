<?php
use yii\helpers\Url;

$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => $post->category->name, 'url' => ['postcategory/view', 'id' => $post->category->id, 'slug' => $post->category->slug]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="post-view">
    <div class="row">
        <div class="col-sm-3">
            <div class="relate">
                <div class="heading">Tin tức mới nhất</div>
                <?php foreach ($rposts as $rpost): ?>
                <div class="rpost">
                    <i class="fa fa-circle text-primary pull-left"></i>
                    <a href="<?= Url::to(['post/view', 'id' => $rpost->id, 'slug' => $rpost->slug]) ?>">
                        <?= $rpost->title ?>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="post">
                <div class="title"><?= $post->title ?></div>
                <div class="content"><?= $post->content ?></div>
            </div>
        </div>
    </div>
</div>
