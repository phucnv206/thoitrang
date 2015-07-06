<?php

namespace app\models;

class CustomData extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'custom_data';
    }

    public function attributeLabels()
    {
        return [
            
        ];
    }

}
