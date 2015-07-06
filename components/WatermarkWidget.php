<?php

namespace app\components;

use yii\base\Widget;
use app\models\Config;

class WatermarkWidget extends Widget
{

    public function run()
    {
        $config = Config::find()->select('watermark')->one();
        return $this->render('watermark', ['watermark' => $config->watermark]);
    }

}
