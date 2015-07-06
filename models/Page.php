<?php

namespace app\models;

class Page extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'page';
    }
    
    public function attributeLabels()
    {
        return [
            'name' => 'Tên',
        ];
    }

}
