<?php
$this->title = 'Tạo mới';
$this->params['breadcrumbs'][] = ['label' => 'Slide ảnh', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="slide-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
