<?php

namespace app\models;

use yii\base\Model;
use app\models\User;
use Yii;

class PasswordForm extends Model
{

    public $password;
    public $newPassword;
    public $newPasswordConfirm;

    public function rules()
    {
        return [
            [['password', 'newPassword', 'newPasswordConfirm'], 'required'],
            [['password'], 'checkPassword'],
            [['newPassword'], 'string', 'min' => 6],
            [['newPasswordConfirm'], 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }
    
    public function checkPassword($attribute, $params)
    {
        $user = User::findOne(Yii::$app->user->id);
        if (!$user->validatePassword($this->password)) {
            $this->addError('password', 'Mật khẩu hiện tại không chính xác.');
        }
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Mật khẩu hiện tại',
            'newPassword' => 'Mật khẩu mới',
            'newPasswordConfirm' => 'Mật khẩu xác nhận',
        ];
    }

}
