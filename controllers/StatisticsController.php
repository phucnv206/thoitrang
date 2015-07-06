<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Session;
use app\models\Category;
use app\models\Product;

class StatisticsController extends Controller
{
    public $layout = 'dashboard';

    public function init()
    {
        parent::init();
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $cateCount = Category::find()->count();
        $productCount = Product::find()->count();
        $onlineCount = Session::find()->where(['status' => 1])->count();
        $userCount = Session::find()->count();
        return $this->render('index', [
            'cateCount' => $cateCount,
            'productCount' => $productCount,
            'onlineCount' => $onlineCount,
            'userCount' => $userCount,
        ]);
    }

}
