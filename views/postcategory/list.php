<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Danh mục';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="category-list">

    <p class="text-right"><?= Html::a('Tạo mới', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => 'Tên',
            ],
            [
                'attribute' => 'thumbnail',
                'format' => 'image',
                'label' => 'Ảnh',
                'contentOptions' => ['class' => 'thumbnail-list']
            ],
            [
                'attribute' => 'status',
                'label' => 'Trạng thái',
                'value' => function ($model) {
                    return $model->getStatusLabel($model->status);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
                'header' => 'Tùy chọn',
                'headerOptions' => ['class' => 'text-center']
            ],
        ],
    ]); ?>
    
</div>
