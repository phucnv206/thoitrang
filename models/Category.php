<?php

namespace app\models;

use app\models\SubCategory;
use app\components\Helpers;

class Category extends \yii\db\ActiveRecord
{

    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;

    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name', 'thumbnail', 'status', 'description'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Tên danh mục',
            'thumbnail' => 'Hình ảnh',
            'status' => 'Trạng thái',
            'description' => 'Tóm tắt',
        ];
    }

    public function getSubcategories()
    {
        return $this->hasMany(SubCategory::className(), ['cate_id' => 'id']);
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
        $model = self::find()->all();
        $categories = [];
        foreach ($model as $category) {
            $categories[$category->id] = $category->name;
        }
        return $categories;
    }
    
    public static function listCategoriesWithSub()
    {
        $model = self::find()->with('subcategories')->all();
        $categories = [];
        foreach ($model as $category) {
            foreach ($category->subcategories as $subcategory) {
                $categories[$category->name][$subcategory->id] = $subcategory->name;
            }
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
            SubCategory::deleteAll(['cate_id' => $this->id]);
            return true;
        } else {
            return false;
        }
    }

}
