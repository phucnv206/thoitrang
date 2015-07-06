<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\PasswordForm;

class UserController extends Controller
{
    
    public $layout = 'dashboard';

    public function behaviors()
    {
        return [
            
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        \Yii::$app->language = 'vi-VN';
        $model = User::find(['id' => Yii::$app->user->id])->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->update();
            return $this->refresh();
        }
        return $this->render('index', ['model' => $model]);
    }
    
    public function actionChangepwd()
    {
        \Yii::$app->language = 'vi-VN';
        $model = new PasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = User::find(['id' => Yii::$app->user->id])->one();
            $user->setPassword($model->newPassword);
            $user->update();
            Yii::$app->session->setFlash('changePasswordCompleted');
            return $this->refresh();
        } else {
            return $this->render('changepwd', ['model' => $model]);
        }
    }
    
}
