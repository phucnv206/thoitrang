<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Order';
?>
<div id="product-order" class="padding-v-50">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?= $order->thumbnail ?>" class="img-responsive center-block thumbnail">
            </div>
            <div class="col-sm-6">
                <div class="text-xx-large">
                    <?= $order->name ?>
                    <p class="text-red"><?= $order->price ?>$</p>
                </div>
                <?php if (Yii::$app->session->hasFlash('orderCompleted')) : ?>
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i> <b>Completed!</b> Your order has been saved
                </div>
                <?php else: ?>
                    <table class="table table-responsive">
                        <tr>
                            <td>Number</td>
                            <td><?= $order->count ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $order->email ?></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><?= $order->message ?></td>
                        </tr>
                    </table>
                    <?php $form = ActiveForm::begin([
                        'id' => 'order-form',
                        'validateOnBlur' => false,
                    ]); ?>
                        <div class="form-group">
                            <?= Html::submitButton('Confirm', ['class' => 'btn btn-link book-btn']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>