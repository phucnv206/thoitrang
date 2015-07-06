<?php
$this->title = 'Update Slide: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Slide ảnh', 'url' => ['list']];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div id="slide-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
