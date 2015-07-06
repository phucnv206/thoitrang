<?php

namespace app\models;

class Thumbnail extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'thumbnail';
    }

    public function rules()
    {
        return [
            [['url'], 'required'],
            [['product_id'], 'integer'],
            [['url'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'url' => 'Hình ảnh',
        ];
    }
    
    public function getProduct()
    {
        return $this->hasOne(Category::className(), ['id' => 'product_id']);
    }

}
