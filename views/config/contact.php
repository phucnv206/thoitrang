<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Tùy chỉnh';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="config-list">

    <div class="panel panel-default">
        <div class="panel-heading">Nội dung liên hệ</div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'contactData')->textarea(['id' => 'tiny-area']) ?>

            <?= $form->field($model, 'contactLocation')->textInput(['maxlength' => 255]) ?>

            <div class="form-group text-center">
                <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
<?php
$this->registerJsFile('/js/tinymce/tinymce.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/wysiwyg.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
