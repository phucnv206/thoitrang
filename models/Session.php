<?php

namespace app\models;
use Yii;

class Session extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'session';
    }
    
    public static function logStat()
    {
        if (Yii::$app->user->isGuest && !Yii::$app->session->has('stat')) {
            $model = Session::find()->where(['id' => Yii::$app->session->id])->one();
            if ($model === null) {
                $model = new Session();
                $model->id = Yii::$app->session->id;
                $model->ip = Yii::$app->request->userIP;
                $model->user_agent = Yii::$app->request->userAgent;
                $model->created = $model->modified = time();
                $model->save();
            }
            Session::updateAll(['status' => 0], 'modified < :time', [':time' => time() - 15 * 60]);
            Yii::$app->session->set('stat', true);
        }
    }

}
