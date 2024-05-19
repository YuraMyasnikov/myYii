<?php

namespace app\controllers\admin;

use app\models\shop\Brand;
use app\models\shop\Categories;
use app\models\shop\Feature;
use app\models\shop\Product;
use app\models\shop\ProductFeature;
use app\models\shop\Sku;
use yii\web\Controller;
use app\models\shop\viewModels\Models;

class ShopController extends Controller
{
    public function actionIndex()
    {
        $model = Models::getCategories();

        return $this->render('/admin/shop/index', compact('model'));

    }

    public function actionCategory($id)
    {
        $model = Models::getCategory($id);

        return $this->render('/admin/shop/category', compact('model'));
    }

    public function actionCreateProduct($category_id)
    {
        $cat =$category_id;
        $rows = Models::getProductFeatureInCategory($category_id);
        $model = new Feature();
        $product = new Product();
        $brands = Models::getArrayBrands();
        $sku = new Sku();

        if (\Yii::$app->request->isPost)
        {
            if ($model->load(\Yii::$app->request->post()) and $product->load(\Yii::$app->request->post()) and $sku->load(\Yii::$app->request->post()) ){
                if ($model->validate() and $product->validate() and $sku->validate())
                {
                    $product->save();
                    $sku->product_id = $product->id;
                    $sku->save();

                    foreach ($rows as $row){
                        $productFeature = new ProductFeature();

                        $productFeature->product_id = $product->id;
                        $productFeature->feature_id = $row['id'];
                        $productFeature->value = $model->{$row['another_name']};
                        $productFeature->save();
                    }

                }
            }
        }

        return $this->render('/admin/shop/createProduct', compact(['model', 'rows', 'brands', 'cat','product', 'sku']));
    }
}