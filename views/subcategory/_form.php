<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Category;

?>

<div id="subcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>
    
    <?= $form->field($model, 'cate_id')->dropDownList(Category::listCategories()) ?>
    
    <?= $form->field($model, 'status')->inline()->radioList($model->listStatus()) ?>

    <div class="form-group text-center">
        <?= Html::a('Trở về', ['list'], ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>