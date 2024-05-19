<?php

namespace app\models\shop\viewModels;

use app\models\shop\Basket;
use app\models\shop\Order;
use app\models\shop\OrderItem;
use app\models\shop\Sku;
use yii\db\ActiveRecord;
use function Symfony\Component\String\s;

class Oorder extends ActiveRecord
{
    public static function getUser(): User
    {
        $name = \Yii::$app->request->post()['Order']['name'];
        $phone = \Yii::$app->request->post()['Order']['phone'];
        $user = \Yii::$app->db->pdo->query("SELECT * FROM user WHERE user.name = {$name} AND user.phone = {$phone}")->fetchObject();
        return $user;
    }

    public static function getBasket($user_id)
    {
        $basket = Basket::find()->where(['user_id' => $user_id])->asArray(true)->all();
        return $basket;
    }

    public static function getSku($id): Sku
    {
        $sku = Sku::findOne($id);
        return $sku;
    }

    public static function getOrder($user_id)
    {
        $order = Order::findOne(['user_id' => $user_id, 'status' => '0']);
        return $order;
    }

//    protected function createOrder() {
//
//        $order = new Order();
//        $order->user_id = 3;
//        $order->save();
//
//        foreach($basketItems as $basketItem) {
//            $item = new OrderItem();
//            $item->order_id = $order->id;
//            $item->sku_id = $basketItem['sku_id'];
//            $item->count = $basketItem['count'];
//            $item->save()
//        }
//
//    }
}

 