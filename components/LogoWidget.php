<?php

namespace app\components;

use yii\base\Widget;
use app\models\Config;

class LogoWidget extends Widget
{

    public function run()
    {
        $config = Config::find()->select('logo')->one();
        return $config->logo;
    }

}
