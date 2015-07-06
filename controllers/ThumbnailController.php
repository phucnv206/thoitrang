<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Thumbnail;

class ThumbnailController extends Controller
{
    
    public $layout = 'dashboard';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['list', 'create', 'delete'],
                'rules' => [
                    [
                        'actions' => ['list', 'create', 'delete'],
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

    public function actionList($product_id)
    {
        $product = Product::find($product_id)->one();
        $dataProvider = new ActiveDataProvider([
            'query' => Thumbnail::find()->where(['product_id' => $product->id]),
        ]);

        return $this->render('list', [
            'product' => $product,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate($product_id)
    {
        $model = new Thumbnail();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['list', 'product_id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'product_id' => $product_id,
            ]);
        }
    }

    public function actionDelete($id, $product_id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['list', 'product_id' => $product_id]);
    }

    protected function findModel($id)
    {
        if (($model = Thumbnail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
