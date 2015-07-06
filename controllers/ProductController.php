<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Category;
use app\models\Order;

class ProductController extends Controller
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
            'query' => Product::find(),
            'pagination' => array('pageSize' => 25),
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Product();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['list']);
        } else {
            $model->status = Product::STATUS_ENABLED;
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
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionView($id)
    {
        $this->layout = 'page';
        $product = Product::find()->where(['id' => $id, 'status' => Product::STATUS_ENABLED])->limit(1)->one();
        if ($product !== null) {
            $relateProducts = Product::find()->where('scate_id = :scate_id AND id != :id AND status = :status', [
                ':scate_id' => $product->scate_id,
                ':id' => $product->id,
                'status' => Product::STATUS_ENABLED
            ])->limit(4)->orderBy('price DESC')->all();
            return $this->render('view', [
                'product' => $product,
                'relateProducts' => $relateProducts,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionOrder($id)
    {
        $this->layout = 'page';
        $model = new Order();
        $categories = Category::findAll(['status' => Category::STATUS_ENABLED]);
        $product = Product::find()->where(['id' => $id, 'status' => Product::STATUS_ENABLED])->limit(1)->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $order = new Order();
            $order->key = strtoupper(Yii::$app->security->generateRandomString(6));
            $order->name = $product->name;
            $order->thumbnail = $product->thumbnail;
            $order->price = $product->price;
            $order->count = $model->count;
            $order->email = $model->email;
            $order->message = $model->message;
            $order->date = time();
            $order->insert();
            Yii::$app->session->set('orderID', $order->id);
            return $this->redirect(['product/confirm']);
        } else {
            return $this->render('order', [
                'model' => $model,
                'categories' => $categories,
                'product' => $product
            ]);
        }
    }
    
    public function actionConfirm()
    {
        if (!Yii::$app->session->has('orderID')) {
            return $this->redirect(['site/index']);
        }
        if (Yii::$app->session->hasFlash('orderCompleted')) {
            $oderID = Yii::$app->session->get('orderID');
            Yii::$app->session->remove('orderID');
        } else {
            $oderID = Yii::$app->session->get('orderID');
        }
        $order = Order::find()->where(['id' => $oderID])->limit(1)->one();
        if (Yii::$app->request->isPost) {
            $order->status = 1;
            $order->update();
            Yii::$app->session->setFlash('orderCompleted', true);
            return $this->refresh();
        } else {
            $this->layout = 'page';
            return $this->render('confirm', ['order' => $order]);
        }
    }

}
