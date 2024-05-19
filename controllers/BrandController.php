<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\shop\viewModels\Models;

class BrandController extends Controller
{
    public function actionIndex($id)
    {
        $model = Models::getBrand($id);

        return $this->render('index', ['model' => $model]);
    }

    public function actionProductsToBrand($id, $category_id)
    {
        $model = Models::getProductsInBrandsInCategory($category_id,$id);
        $brand = Models::getBrand($id);

        return $this->render('productsInCategory', compact(['model','brand']));
    }
}