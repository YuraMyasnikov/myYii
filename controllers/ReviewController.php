<?php

namespace app\controllers;

use app\models\shop\Reviews;
use yii\web\Controller;

class ReviewController extends Controller
{

    public function actionIndex($id)
    {
        $review = new Reviews();

        if (\Yii::$app->request->isPost){
            /*dd(\Yii::$app->request->post());*/
            $review->user_id = \Yii::$app->request->post()['Reviews']['user_id'];
            $review->reviews_product = \Yii::$app->request->post()['Reviews']['reviews_product'];
            $review->like = \Yii::$app->request->post()['Reviews']['like'];
            $review->dislike = \Yii::$app->request->post()['Reviews']['dislike'];
            $review->text = \Yii::$app->request->post()['Reviews']['text'];
           /* $review->user_id = \Yii::$app->request->post()['user_id'];
            $review->reviews_product = \Yii::$app->request->post()['reviews_product'];
            $review->like = \Yii::$app->request->post()['like'];
            $review->dislike = \Yii::$app->request->post()['dislike'];
            $review->text = \Yii::$app->request->post()['text'];*/

            $review->save();

            return $this->goBack(['shop/product', 'id' => $id]);
        }
        return $this->goBack();
    }
}