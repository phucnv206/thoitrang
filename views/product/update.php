<?php
$this->title = 'Cập nhật';
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['list']];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div id="product-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
