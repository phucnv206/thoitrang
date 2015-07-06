<?php

namespace app\models;
use app\components\Helpers;

class Product extends \yii\db\ActiveRecord
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['sku', 'name', 'scate_id', 'thumbnail', 'price', 'description', 'detail', 'status'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sku' => 'Mã sản phẩm',
            'name' => 'Tên sản phẩm',
            'scate_id' => 'Danh mục con',
            'thumbnail' => 'Ảnh',
            'price' => 'Đơn giá',
            'description' => 'Mô tả',
            'detail' => 'Chi tiết',
            'status' => 'Trạng thái',
        ];
    }
    
    public function getSubcategory()
    {
        return $this->hasOne(SubCategory::className(), ['id' => 'scate_id']);
    }
    
    public function getThumbnails()
    {
        return $this->hasMany(Thumbnail::className(), ['product_id' => 'id'])->limit(3);
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
            $this->slug = Helpers::getSlug($this->name);
            return true;
        } else {
            return false;
        }
    }

}
