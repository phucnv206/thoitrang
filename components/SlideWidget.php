<?php

namespace app\components;

use yii\base\Widget;
use app\models\Slide;

class SlideWidget extends Widget
{

    public $id;

    public function run()
    {
        if ($this->id === null) {
            $slides = Slide::find()->where(['status' => Slide::STATUS_ENABLED])->all();
        } else {
            $slides = Slide::find()->where(['id' => $this->id, 'status' => Slide::STATUS_ENABLED])->limit(1)->all();
        }
        return $this->render('slide', ['slides' => $slides]);
    }

}
