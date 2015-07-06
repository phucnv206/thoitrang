<?php

namespace app\models;

use yii\base\Model;

class ContactForm extends Model
{
    public $fullname;
    public $email;
    public $address;
    public $subject;
    public $message;
    public $verifyCode;

    public function rules()
    {
        return [
            [['fullname', 'subject', 'email', 'message'], 'required'],
            ['email', 'email'],
            [['fullname', 'subject', 'message'], 'string', 'length' => [4, 100]],
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fullname' => 'Họ và tên',
            'subject' => 'Chủ đề',
            'email' => 'Email',
            'message' => 'Thông điệp',
            'verifyCode' => 'Mã xác thực',
        ];
    }

    public function contact($email)
    {
        if ($this->validate()) {
//            Yii::$app->mailer->compose()
//                ->setTo($email)
//                ->setFrom([$this->email => $this->fullname])
//                ->setSubject($this->subject)
//                ->setTextBody($this->message)
//                ->send();
            return true;
        } else {
            return false;
        }
    }
}
