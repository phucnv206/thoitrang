<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Menu';
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
            'name',
            'url',
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
                'headerOptions' => ['class' => 'text-center'],
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return (int)$model->system === 0 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'data-method' => 'post',
                            'data-confirm' => 'Bạn có chắc là sẽ xóa mục này không?',
                        ]) : '';
                    },
                ],
            ],
        ],
    ]); ?>
    
</div>
