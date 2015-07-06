<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Config;
use app\models\CustomData;
use app\models\ConfigForm;

class ConfigController extends Controller
{

    public $layout = 'dashboard';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'contact'],
                'rules' => [
                    [
                        'actions' => ['index', 'contact'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = Config::find()->one();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }

    public function actionContact()
    {
        $customData = CustomData::find()->where(['key' => 'contact'])->one();
        $contact = json_decode($customData->value, TRUE);
        $model = new ConfigForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = json_encode(array('contact_data' => $model->contactData, 'contact_location' => $model->contactLocation));
            $customData->value = $data;
            $customData->update();
            return $this->refresh();
        } else {
            $model->contactData = $contact['contact_data'];
            $model->contactLocation = $contact['contact_location'];
            return $this->render('contact', ['model' => $model]);
        }
    }

}
