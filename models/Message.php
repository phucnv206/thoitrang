<?php

namespace app\models;

class Message extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'message';
    }

    public function attributeLabels()
    {
        return [
            'fullname' => 'Họ tên',
            'subject' => 'Chủ đề',
            'email' => 'Email',
            'date' => 'Gửi lúc',
            'message' => 'Nội dung',
        ];
    }

}
