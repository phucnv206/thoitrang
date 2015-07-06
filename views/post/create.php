<?php

$this->title = 'Tạo mới';
$this->params['breadcrumbs'][] = ['label' => 'Bài viết', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="post-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
