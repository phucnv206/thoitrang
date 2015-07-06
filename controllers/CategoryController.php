<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Category;
use app\models\SubCategory;
use app\models\Product;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;


class CategoryController extends Controller
{
    
    public $layout = 'dashboard';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['list', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['list', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Category();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['list']);
        } else {
            $model->status = Category::STATUS_ENABLED;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['list']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['list']);
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionView($id)
    {
        $this->layout = 'page';
        $category = Category::find()
                ->with([
                    'subcategories.products' => function($query) {
                        $query->where(['status' => Category::STATUS_ENABLED]);
                    },
                ])
                ->where(['id' => $id, 'status' => Category::STATUS_ENABLED])
                ->asArray()
                ->one();
        $products = [];
        foreach ($category['subcategories'] as $subcategory) {
            foreach ($subcategory['products'] as $product) {
                $products[] = $product;
            }
        }
        if ($category !== null) {
            return $this->render('view', [
                'category' => $category,
                'products' => $products,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
