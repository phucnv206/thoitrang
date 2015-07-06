<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Bài viết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="post-list">

    <p class="text-right"><?= Html::a('Tạo mới', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'attribute' => 'cate_id',
                'value' => function ($model) {
                    return $model->category->name;
                }
            ],
            [
                'attribute' => 'thumbnail',
                'format' => 'image',
                'contentOptions' => ['class' => 'thumbnail-list']
            ],
            [
                'attribute' => 'date',
                'value' => function ($model) {
                    return date('d/m/Y', strtotime($model->date));
                },
                'label' => 'Ngày đăng',
            ],
            [
                'attribute' => 'status',
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
