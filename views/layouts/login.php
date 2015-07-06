<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link href="/css/dashboard.css" rel="stylesheet">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => ['/dashboard'],
            'options' => [
                'class' => 'navbar-inverse',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Trang chủ', 'url' => Yii::$app->homeUrl],
                Yii::$app->user->isGuest ?
                    ['label' => 'Đăng nhập', 'url' => ['/dashboard']] :
                    ['label' => 'Thoát (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/dashboard/logout'],
                        'linkOptions' => ['data-method' => 'post']],
            ],
        ]);
        NavBar::end();
    ?>

    <div id="dashboard" class="container">
        <?= Breadcrumbs::widget([
            'encodeLabels' => false,
            'homeLink' => [
                'label' => '<span class="glyphicon glyphicon-home"></span>',
                'url' => ['/dashboard'],
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>

    <footer class="footer">
        <div class="container text-center">
            &copy; <?= Yii::$app->name ?> <?= date('Y') ?>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
