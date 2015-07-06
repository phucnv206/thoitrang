<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category;
use app\models\SubCategory;
use app\models\Product;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class SubcategoryController extends Controller
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

    public function actionView($id)
    {
        $this->layout = 'products';
        $category = Category::find()->where(['id' => $id, 'status' => Category::STATUS_ENABLED])->limit(1)->one();
        if ($category !== null) {
            $query = Product::find()->where(['cate_id' => $id, 'status' => Product::STATUS_ENABLED]);
            $countQuery = clone $query;
            $pagination = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 9]);
            $products = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render('view', [
                'category' => $category,
                'products' => $products,
                'pagination' => $pagination,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SubCategory::find()
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new SubCategory();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['list']);
        } else {
            $model->status = SubCategory::STATUS_ENABLED;
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
        if (($model = SubCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
