<?php

use yii\grid\GridView;
use yii\helpers\Html;
$this->title = 'Trang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="page-list">

    <p class="text-right"><?= Html::a('Tạo mới', ['create'], ['class' => 'btn btn-success']) ?></p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover table-responsive'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'system',
                'label' => 'Loại trang',
                'value' => function ($model) {
                    return (int)$model->system === 0 ? 'Trang thường' : 'Trang hệ thống';
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