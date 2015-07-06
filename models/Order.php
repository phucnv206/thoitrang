<?php

namespace app\models;

class Order extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return [
            [['count', 'email'], 'required'],
            [['count'], 'integer', 'min' => 1],
            ['email', 'email'],
            [['message', 'key'], 'string'],
            [['message'], 'string', 'max' => 255],
            [['name', 'price'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'count' => 'Number',
            'email' => 'Email',
            'message' => 'Message',
        ];
    }

}
