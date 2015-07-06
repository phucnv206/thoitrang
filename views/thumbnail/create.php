<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Tạo mới';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách hình', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="product-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url', [
        'inputOptions' => ['id' => 'browse-img'],
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button type="button" id="browse-btn" class="btn btn-default"><i class="fa fa-search"></i></a></span></div>'
    ])->textInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'product_id')->hiddenInput(['value' => $product_id])->label(false) ?>

    <div class="form-group text-center">
        <?= Html::a('Trở về', ['list'], ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJsFile('/js/tinymce/tinymce.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/wysiwyg.js', ['depends' => [\yii\web\JqueryAsset::className()]]);