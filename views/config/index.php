<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Tùy chỉnh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="config-index">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'logo', [
        'options' => ['class' => 'form-group row'],
        'inputOptions' => ['id' => 'browse-img'],
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button type="button" id="browse-btn" class="btn btn-default"><i class="fa fa-search"></i></a></span></div>'
    ])->textInput(['maxlength' => 255]) ?>
    <div class="form-group row">
        <div class="col-sm-3 col-sm-offset-3"><img src="<?= $model->logo ?>" class="logo-preview img-responsive img-thumbnail"></div>
    </div>
    
    <?= $form->field($model, 'watermark')->checkbox(); ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJsFile('/js/tinymce/tinymce.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/wysiwyg.js', ['depends' => [\yii\web\JqueryAsset::className()]]);