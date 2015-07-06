<?php

use yii\grid\GridView;

$this->title = 'Đơn hàng';
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
                'attribute' => 'key',
                'label' => 'Mã ĐH',
            ],
            [
                'attribute' => 'name',
                'label' => 'Sản phẩm',
                'format' => 'raw',
                'contentOptions' => ['class' => 'thumbnail-list text-center'],
                'value' => function ($model) {
                    return '<p><img src="' . $model->thumbnail . '"></p>' . $model->name;
                }
            ],
            [
                'attribute' => 'price',
                'label' => 'Đơn giá',
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return $model->price . '$';
                }
            ],
            [
                'attribute' => 'count',
                'label' => 'Số lượng',
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'date',
                'label' => 'Thời gian',
                'value' => function ($model) {
                    return date('H:s d/m/Y', $model->date);
                }
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'label' => 'Khách hàng',
                'value' => function ($model) {
                    return '<p>Email: <b>' . $model->email . '</b></p>Nội dung: ' . $model->message;
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'label' => 'Xác nhận',
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return $model->status == 1 ? '<i class="fa fa-check"></i>' : '';
                }
            ],
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