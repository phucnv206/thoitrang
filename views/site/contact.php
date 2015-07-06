<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Liên hệ với chúng tôi';
?>
<div id="site-contact">
    <div class="heading"><?= $this->title ?></div>
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1 form">
            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
                <p class="text-success">
                    Xin cảm ơn quý khách, chúng tôi sẽ liên hệ quý khách trong thời gian sớm nhất.
                </p>
            <?php else: ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'validateOnBlur' => false,
                ]); ?>
                    <?= $form->field($model, 'fullname')->label(false)->textInput(['placeholder' => $model->getAttributeLabel('fullname')]) ?>
                <?= $form->field($model, 'subject')->label(false)->textInput(['placeholder' => $model->getAttributeLabel('subject')]) ?>
                    <?= $form->field($model, 'email')->label(false)->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
                    <?= $form->field($model, 'message')->label(false)->textArea(['rows' => 3, 'placeholder' => $model->getAttributeLabel('message')]) ?>
                    <?= $form->field($model, 'verifyCode')->label(false)
                        ->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-6">{input}</div><div class="col-lg-3">{image}</div></div>',
                        'options' => ['placeholder' => $model->getAttributeLabel('verifyCode'), 'class' => 'form-control']
                    ])?>
                    <div class="form-group">
                        <?= Html::submitButton('Gửi đi', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-5">
            <?= $contactData['contact_data'] ?>
        </div>
    </div>
    <p class="map-title text-italic">Bản đồ đến với chúng tôi</p>
    <div id="googleMap" style="width: 100%; min-height: 400px; margin-bottom: 15px"></div>
</div>
<?php
$this->registerJsFile('http://maps.googleapis.com/maps/api/js');
$this->registerJs("
    function initialize() {
        var myLatlng = new google.maps.LatLng(" . $contactData['contact_location'] . ");
        var mapProp = {
            center: myLatlng,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('googleMap'), mapProp);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: '" . Yii::$app->name . "'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
");
