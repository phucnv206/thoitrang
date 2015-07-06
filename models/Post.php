<?php

namespace app\models;
use app\components\Helpers;

class Post extends \yii\db\ActiveRecord
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['title', 'cate_id', 'thumbnail', 'status'], 'required'],
            [['cate_id'], 'integer'],
            [['date'], 'safe'],
            [['description', 'content'], 'string'],
            [['status'], 'in', 'range' => array_keys(self::listStatus())],
            [['title', 'slug', 'thumbnail'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Tiêu đề',
            'cate_id' => 'Thể loại',
            'thumbnail' => 'Ảnh',
            'description' => 'Tóm tắt',
            'content' => 'Nội dung',
            'status' => 'Trạng thái',
        ];
    }
    
    public function getCategory()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'cate_id']);
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
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->slug = Helpers::getSlug($this->title);
            if ($insert) {
                $this->date = date('Y-m-d');
            }
            return true;
        } else {
            return false;
        }
    }
    
}
