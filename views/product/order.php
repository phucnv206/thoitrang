<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Order';
?>
<div id="product-order" class="padding-v-50">
    <div class="container">
        <div class="text-large text-center text-uppercase margin-bottom-15"><?= Yii::$app->name ?> Menu</div>
        <div id="first-menu" class="text-center margin-bottom-30">
            <ul>
                <?php foreach ($categories as $item): ?>
                <li>
                    <a href="<?= Url::to(['category/view', 'id' => $item->id, 'slug' => $item->slug]) ?>"
                       class="<?= $item->id === $product->cate_id ? 'active' : '' ?>">
                        <?= $item->name ?>
                    </a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <img src="<?= $product->thumbnail ?>" class="img-responsive center-block thumbnail">
            </div>
            <div class="col-sm-6">
                <div class="text-xx-large">
                    <?= $product->name ?>
                    <p class="text-red"><?= $product->price ?>$</p>
                </div>
                <?php $form = ActiveForm::begin([
                    'id' => 'order-form',
                    'validateOnBlur' => false,
                ]); ?>
                    <?= $form->field($model, 'count')->label(false)->input('number', ['placeholder' => $model->getAttributeLabel('count')]) ?>
                    <?= $form->field($model, 'email')->label(false)->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
                    <?= $form->field($model, 'message')->label(false)->textArea(['rows' => 6, 'placeholder' => $model->getAttributeLabel('message')]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Book now', ['class' => 'btn btn-link book-btn']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>