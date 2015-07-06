<?php

$this->title = 'Cập nhật';
$this->params['breadcrumbs'][] = ['label' => 'Bài viết', 'url' => ['list']];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div id="post-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
