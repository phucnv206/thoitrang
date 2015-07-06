<?php

namespace app\components;

use yii\base\Widget;
use app\models\Category;

class HomeProductsWidget extends Widget
{
    
    public $id = 1;

    public function run()
    {
        $category = Category::find()->with('subcategories.products')
                ->where('id = :id AND status = :status', [':id' => $this->id, ':status' => Category::STATUS_ENABLED])->asArray()->one();
        $products = [];
        foreach ($category['subcategories'] as $subcategory) {
            foreach ($subcategory['products'] as $product) {
                $products[] = $product;
            }
        }
        return $this->render('home_products', ['category' => $category, 'products' => $products]);
    }

}
