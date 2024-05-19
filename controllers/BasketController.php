<?php

namespace app\controllers;

use app\models\shop\Basket;
use app\models\shop\User;
use app\models\shop\viewModels\Models;
use Yii;
use yii\web\Controller;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $models = Models::make();
        $user_id = User::id();
        $sql = "SELECT * FROM basket WHERE basket.user_id == {$user_id}";
        $basketUser = Basket::findAll([
            'user_id' => $user_id
        ]);


        return $this->render('basket', compact(['basketUser', 'models']));
    }
    public function actionAdd($id)
    {
        $basket = new Basket();

        if (Yii::$app->request->isPost){
            if ($basket->load(Yii::$app->request->post()) ){
               /* dd(Yii::$app->request->post()['Basket']['sku_id']);*/
                $basket->sku_id = Yii::$app->request->post()['Basket']['sku_id'];
                $basket->count = Yii::$app->request->post()['Basket']['count'];
                $basket->price = Yii::$app->request->post()['Basket']['price'];
                $basket->user_id = Yii::$app->request->post()['Basket']['user_id'];
                $basket->product_id = Yii::$app->request->post()['Basket']['product_id'];
                $basket->save();
            }
        }



        return \Yii::$app->response->redirect(Yii::$app->request->referrer);
    }
}

