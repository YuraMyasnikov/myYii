<?php

namespace app\controllers;


use app\models\shop\viewModels\Models;
use yii\base\Model;
use yii\web\Controller;

class ShopController extends Controller
{
    public function actionIndex()
    {
        $model = Models::make();

        return $this->render("index", ['model' => $model]);
    }

    public function actionCategory($id)
    {
        $model = Models::getCategory($id);

        return $this->render('category',['model' => $model]);
    }

    public function actionProduct($id)
    {
        $model = Models::getProduct($id);
        $reviews = Models::getReview($id);

        return $this->render('product',['model' => $model, 'reviews' => $reviews]);
    }

}