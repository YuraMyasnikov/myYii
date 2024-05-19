<?php

namespace app\models\shop\viewModels;

use app\models\shop\Brand;
use app\models\shop\Feature;
use app\models\shop\GlobalCategories;
use app\models\shop\Categories;
use app\models\shop\Product;
use app\models\shop\ProductFeature;
use app\models\shop\Reviews;
use app\models\shop\User;
use yii\db\ActiveRecord;

class Models extends ActiveRecord
{
    public static function make(): self
    {
        return new self();
    }


    /*Категории*/
    public static function getArrayCategories(): array
    {
        $categories = Categories::find()->asArray()->all();
        return $categories;
    }
    public static function getCategories(): array
    {
        $categories = Categories::find()->all();
        return $categories;
    }
    public static function getCategory($id)
    {
        $category = Categories::findOne($id);
        return $category;
    }

    /*Продукты*/
    public static function getArrayProducts(): array
    {
        $products = Product::find()->asArray()->all();
        return $products;
    }
    public static function getProducts(): array
    {
        $products = Product::find()->all();
        return $products;
    }
    public static function getProduct($id)
    {
        $product = Product::findOne($id);

        return $product;
    }

    /*sku*/




    public static function getProductFeatureInCategory($category_id)
    {
       $form = Feature::find()
           ->select(['feature.id', 'feature.name', 'feature.another_name'])
           ->innerJoin('product_feature_in_category', 'product_feature_in_category.p_f_feature_id = feature.id')
           ->innerJoin('category', 'product_feature_in_category.p_f_category_id = category.id')
           ->where(['category.id' => $category_id])
           ->asArray()
           ->all();
        return $form;
    }

    /*Бренды*/
    public static function getArrayBrands(): array
    {
        $brands = Brand::find()->asArray()->all();
        return $brands;
    }
    public static function getBrands(): array
    {
        $brands = Brand::find()->all();
        return $brands;
    }
    public static function getBrandsFromProduct($id)
    {
        $brands = Brand::find()->where(['id' => $id])->behaviors()->all();
        return$brands;
    }
    public static function getBrand($id)
    {
        $brand = Brand::findOne($id);
        return $brand;
    }



    public static function getProductsInBrandsInCategory($id_category, $id_brand)
    {
        $products = Product::find()
            ->where(['category_id' => $id_category, 'brand_id' => $id_brand])
            ->all();

        return $products;
    }

    public static function getArrayFeatureValue($id)
    {
        $options = Product::find()
            ->select(['feature.name as feature_name', 'product_feature.value'])
            ->leftJoin('product_feature', 'product.id = product_feature.product_id')
            ->leftJoin('feature', 'feature.id = product_feature.feature_id')
            ->where(['product.id' => $id])
            ->asArray()
            ->all();

        return $options;
    }

    public static function getBrandsFromCategory($id)
    {
        $brands = Product::find()
            ->select(['brands.name','brands.image','brands.id'    ])
            ->distinct()
            ->joinWith('brand', true, 'INNER JOIN')
            ->where(['product.category_id' => $id])
            ->all();

        return $brands;
    }




    /*Отзывы*/
    public static function getReviews()
    {
        $reviews = Reviews::find()->all();
        return $reviews;
    }

    public static function getReview($id)
    {
        $reviews = Reviews::find()->where(['reviews_product' => $id])->all();
        return $reviews;
    }


    public static function getUser()
    {
        $user = User::findIdentity(97);
        return $user;
    }

    public static function getLoginUser($name,$password)
    {
        $user = User::find()
            ->where(['name' => $name, 'password' => $password])
            ->one();

        return $user;
    }
}