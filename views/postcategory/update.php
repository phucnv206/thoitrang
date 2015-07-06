<?php
$this->title = 'Cập nhật';
$this->params['breadcrumbs'][] = ['label' => 'Thể loại', 'url' => ['list']];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div id="category-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
