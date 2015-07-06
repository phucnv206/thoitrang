<?php

namespace app\models;

class Config extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'config';
    }

    public function rules()
    {
        return [
            [['name', 'logo'], 'required'],
            [['watermark'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Tên website',
            'logo' => 'Logo',
            'watermark' => 'Hiển thị bản quyền',
        ];
    }
    
}
