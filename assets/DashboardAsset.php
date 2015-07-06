<?php

namespace app\assets;

use yii\web\AssetBundle;

class DashboardAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        'js/bootstrap.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
