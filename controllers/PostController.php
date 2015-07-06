<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class PostController extends Controller
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
        $this->layout = 'page';
        if (($post = Post::find()->where(['id' => $id, 'status' => Post::STATUS_ENABLED])->one()) !== null) {
            $rposts = Post::find()->where('cate_id = :cate_id AND id != :id AND status = :status', [
                ':cate_id' => $post->cate_id,
                'id' => $post->id,
                'status' => Post::STATUS_ENABLED
            ])->limit(4)->orderBy('id DESC')->all();
            return $this->render('view', [
                'post' => $post,
                'rposts' => $rposts,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
            'pagination' => array('pageSize' => 25),
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Post();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['list']);
        } else {
            $model->status = POST::STATUS_ENABLED;
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
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
