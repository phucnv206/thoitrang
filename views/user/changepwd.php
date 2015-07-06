<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đổi mật khẩu';
$this->params['breadcrumbs'][] = ['label' => 'Bảo mật', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="user-changepwd">
    <?php if (Yii::$app->session->hasFlash('changePasswordCompleted')): ?>
    <div class="alert alert-success">
        <i class="fa fa-check-circle"></i> Đổi mật khẩu thành công
    </div>
    <?php endif ?>
    <?php $form = ActiveForm::begin([
        'id' => 'password-form',
        'validateOnBlur' => false,
    ]); ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'newPassword')->passwordInput() ?>
        <?= $form->field($model, 'newPasswordConfirm')->passwordInput() ?>
        <div class="form-group">
            <?= Html::a('Trở về', ['index'], ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton('Xác nhận', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
