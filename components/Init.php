<?php
namespace app\components;
use yii\base\Component;
use app\models\Session;

class Init extends Component
{
    public function init()
    {
        Session::logStat();
    }

}
