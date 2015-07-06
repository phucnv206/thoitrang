<?php

namespace app\models;

use app\models\Post;
use app\components\Helpers;

class PostCategory extends \yii\db\ActiveRecord
{

    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;

    public static function tableName()
    {
        return 'post_category';
    }

    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['description'], 'string'],
            [['status'], 'in', 'range' => array_keys(self::listStatus())],
            [['name', 'slug'], 'string', 'max' => 100],
            [['thumbnail'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Tên',
            'thumbnail' => 'Ảnh',
            'description' => 'Mô tả',
            'status' => 'Trạng thái',
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['cate_id' => 'id'])->asArray();
    }
    
    public static function listStatus()
    {
        return [
            self::STATUS_DISABLED => 'Ẩn',
            self::STATUS_ENABLED => 'Hiện'
        ];
    }
    
    public static function listCategories()
    {
        $model = self::find()->where(['status' => self::STATUS_ENABLED])->all();
        $categories = [];
        foreach ($model as $category) {
            $categories[$category->id] = $category->name;
        }
        return $categories;
    }

    public static function getStatusLabel($status)
    {
        $array = self::listStatus();
        return $array[$status];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->slug = Helpers::getSlug($this->name);
            return true;
        } else {
            return false;
        }
    }
    
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            Post::deleteAll(['cate_id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }

}
