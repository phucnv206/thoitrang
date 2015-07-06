<?php
$this->title = 'Tạo mới';
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="category-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
