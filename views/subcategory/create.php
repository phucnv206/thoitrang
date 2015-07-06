<?php
$this->title = 'Tạo mới';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="category-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
