<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\components\SlideWidget;

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
            <?= $this->render('_header') ?>
            <?= $this->render('_navbar') ?>
            <?= SlideWidget::widget() ?>
            <div class="bg-grey">
                <div class="container bg-white">
                    <?= $content ?>
                    <?= $this->render('_brands') ?>
                    <?= $this->render('_footer') ?>
                </div>
            </div>    
        <?php $this->endBody() ?>
        <script src="/js/unslider.min.js"></script>
        <script>
            $(function() {
                $('.banner').unslider();
            });
        </script>
    </body>
</html>
<?php $this->endPage() ?>