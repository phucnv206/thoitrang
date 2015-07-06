<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\components\SidebarWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link href="/css/helper.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        
        <?php $this->beginBody() ?>
            <?= $this->render('_navbar') ?>
            <div id="products">
                <img src="/img/product-cover.jpg" alt="" class="img-responsive margin-bottom-30">
                <div class="container">
                    <div class="col-sm-3">
                        <?= SidebarWidget::widget() ?>
                    </div>
                    <div class="col-sm-9">
                        <?= $content ?>
                    </div>
                </div>
            </div>    
            <?= $this->render('_footer') ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>