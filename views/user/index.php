<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Bảo mật';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="user-index">
    <?php $form = ActiveForm::begin([
        'id' => 'user-form',
        'validateOnBlur' => false,
    ]); ?>
    <table class="table table-bordered table-hover">
        <tr>
            <td>Tên đăng nhập / Email</td>
            <td>
                <p>
                    <?= $form->field($model, 'username')->textInput() ?>
                </p>
                <?= $form->field($model, 'email')->textInput() ?>
                <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-primary']) ?>
            </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><?=Html::a('Đổi mật khẩu', ['user/changepwd']) ?></td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>
</div>
