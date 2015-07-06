<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Slide ảnh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="slide-index">

    <p class="text-right"><?= Html::a('Tạo mới', ['create'], ['class' => 'btn btn-success']) ?></p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'src',
                'format' => 'image',
                'label' => 'Ảnh',
                'contentOptions' => ['class' => 'thumbnail-list']
            ],
            [
                'attribute' => 'name',
                'label' => 'Tên',
            ],
            [
                'attribute' => 'url',
                'label' => 'Liên kết',
                'format' => 'url',
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
