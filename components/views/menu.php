<?php
use app\components\MenuDropdownWidget;
?>
<ul class="ul-clear">
    <?php foreach ($menu as $i=>$item): ?>
        <?php $active = Yii::$app->request->url === $item->url ? 'active' : '' ?>
        <?php if ($i === 0): ?>
            <li class="<?= $active ?>"><a href="<?= $item->url ?>"><span class="glyphicon glyphicon-plus"></span> <?= $item->name ?></a></li>
        <?php else: ?>
            <li class="<?= $active ?>">
                <?php if ($item->id === Yii::$app->params['product_menu_id']): ?>
                    <a href="<?= $item->url ?>" class="dropdown-trigger"><?= $item->name ?></a>
                    <?= MenuDropdownWidget::widget() ?>
                <?php else: ?>
                    <a href="<?= $item->url ?>"><?= $item->name ?></a>
                <?php endif ?>
            </li>
        <?php endif ?>
    <?php endforeach ?>
</ul>
