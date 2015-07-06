<?php

use yii\grid\GridView;

$this->title = 'Tin nhắn';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="order-list">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'date',
                'label' => 'Gửi lúc',
                'value' => function ($model) {
                    return date('H:s d/m/Y', $model->date);
                }
            ],
            'fullname',
            'subject',
            'email',
            'message',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{delete}',
                'header' => 'Tùy chọn',
                'headerOptions' => ['class' => 'text-center']
            ],
        ],
    ]); ?>
    
</div>