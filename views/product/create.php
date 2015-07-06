<?php
$this->title = 'Tạo mới';
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="product-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
