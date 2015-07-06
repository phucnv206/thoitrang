<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;
use app\models\Post;
use app\models\ContactForm;
use app\models\Page;
use app\models\Message;
use app\models\CustomData;

class SiteController extends Controller
{
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
        return $this->render('index');
    }

    public function actionContact()
    {
        $this->layout = 'page';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $message = new Message();
            $message->fullname = $model->fullname;
            $message->subject = $model->subject;
            $message->email = $model->email;
            $message->message = $model->message;
            $message->date = time();
            $message->insert();
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            $customData = CustomData::find()->where(['key' => 'contact'])->one();
            $contactData = json_decode($customData->value, TRUE);
            return $this->render('contact', [
                'model' => $model,
                'contactData' => $contactData,
            ]);
        }
    }

    public function actionAbout()
    {
        $this->layout = 'page';
        $page = Page::find()->where(['key' => 'about'])->limit(1)->one();
        return $this->render('about', ['page' => $page]);
    }
    
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if ($action->id === 'error')
                 $this->layout ='page';
            return true;
        } else {
            return false;
        }
    }
    
}
