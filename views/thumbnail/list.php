<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Danh sách hình';
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['product/list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="product-list">

    <h3>Hình ảnh của <?= $product->name ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            [
                'attribute' => 'url',
                'format' => 'image',
                'contentOptions' => ['class' => 'thumbnail-list']
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{delete}',
                'header' => 'Tùy chọn',
                'headerOptions' => ['class' => 'text-center'],
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-trash-o"></i>', [
                            'thumbnail/delete',
                            'id' => $key,
                            'product_id' => $model->product_id
                        ], [
                            'title' => 'Xóa',
                            'data-method' => 'post',
                            'data-confirm' => 'Bạn có chắc là sẽ xóa mục này không?',
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>
    
    <p class="text-right"><?= Html::a('Tạo mới', ['create', 'product_id' => $product->id], ['class' => 'btn btn-success']) ?></p>

</div>
