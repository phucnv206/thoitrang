<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DashboardAsset;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="/css/dashboard.css" rel="stylesheet">
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
            'encodeLabels' => false,
            'items' => [
                ['label' => 'Trang chủ', 'url' => Yii::$app->homeUrl, 'linkOptions' => ['target' => '_blank']],
                Yii::$app->user->isGuest ?
                    '' :
                    ['label' => '<i class="fa fa-lock"></i> Bảo mật',
                        'url' => ['/user/index']],
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
        <div class="row">
            <div class="col-sm-3">
                <?php echo Nav::widget([
                    'encodeLabels' => false,
                    'items' => [
//                        ['label' => '<i class="fa fa-bars"></i> Menu', 'url' => ['menu/list']],
//                        ['label' => '<i class="fa fa-magnet"></i> Hãng sản xuất', 'url' => ['producer/list']],
                        ['label' => '<i class="fa fa-inbox"></i> Danh mục', 'url' => ['category/list']],
                        ['label' => '<i class="fa fa-inbox"></i> Danh mục con', 'url' => ['subcategory/list']],
                        ['label' => '<i class="fa fa-tags"></i> Sản phẩm', 'url' => ['product/list']],
                        ['label' => '<i class="fa fa-shopping-cart"></i> Đơn hàng', 'url' => ['order/list']],
                        ['label' => '<i class="fa fa-pencil-square-o"></i> Bài viết', 'url' => ['post/list']],
                        ['label' => '<i class="fa fa-file-text-o"></i> Trang', 'url' => ['page/list']],
                        ['label' => '<i class="fa fa-envelope-square"></i> Tin nhắn', 'url' => ['message/list']],
                        ['label' => '<i class="fa fa-cog"></i> Tùy chỉnh', 'url' => ['config/index']],
                        ['label' => '<i class="fa fa-pencil-square"></i> Nội dung liên hệ', 'url' => ['config/contact']],
                        ['label' => '<i class="fa fa-bar-chart"></i> Thống kê', 'url' => ['statistics/index']],
                        ['label' => '<i class="fa fa-picture-o"></i> Slide ảnh', 'url' => ['slide/list']],
                        ['label' => '<i class="fa fa-film"></i> Gallery', 'url' => '#'],
                    ],
                    'options' => ['class' =>'nav-pills nav-stacked'],
                ]); ?>
            </div>
            <div class="col-sm-9"><?= $content ?></div>
        </div>
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
