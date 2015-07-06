<?php
use yii\helpers\Url;
$this->title = 'Quản trị';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="dashboard-index">
    <div class="jumbotron">
        <h1>Xin chào <?= Yii::$app->user->identity->username ?>!</h1>
        <p>Bạn đã đăng nhập vào hệ thống quản trị website <?= Yii::$app->name ?>.</p>
        <p><a class="btn btn-primary btn-lg" href="<?= Url::to(['statistics/index']) ?>">Xem thống kê</a></p>
    </div>
</div>
