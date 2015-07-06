<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ConfigForm extends Model
{

    public $contactData;
    public $contactLocation;

    public function rules()
    {
        return [
            [['contactData', 'contactLocation'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'contactData' => 'Nội dung',
            'contactLocation' => 'Tọa độ',
        ];
    }

}
