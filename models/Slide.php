<?php

namespace app\models;

class Slide extends \yii\db\ActiveRecord
{
    
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    
    public static function tableName()
    {
        return 'slide';
    }

    public function rules()
    {
        return [
            [['src', 'status'], 'required'],
            [['ordering'], 'integer'],
            [['status'], 'in', 'range' => array_keys(self::listStatus())],
            [['src', 'url'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'src' => 'Ảnh',
            'name' => 'Tên',
            'url' => 'Liên kết',
            'status' => 'Trạng thái',
            'ordering' => 'Thứ tự',
        ];
    }
    
    public static function listStatus()
    {
        return [
            self::STATUS_DISABLED => 'Ẩn',
            self::STATUS_ENABLED => 'Hiện'
        ];
    }


    public static function getStatusLabel($status)
    {
        $array = self::listStatus();
        return $array[$status];
    }
}
