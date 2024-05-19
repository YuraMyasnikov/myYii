<?php

namespace app\controllers;

use app\models\shop\Order;
use app\models\shop\OrderItem;
use app\models\shop\User;
use yii\web\Controller;
use Yii;
use app\models\shop\viewModels\Oorder;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $model = new Order();

        if (Yii::$app->request->isPost)
        {
            $user = Oorder::getUser();
            $basketItems = Oorder::getBasket($user->id);

            $model->user_id = $user->id;
            $model->count = count($basketItems);
            foreach ($basketItems as $item)
            {
                $model->sum += $item->price;
            }
            $model->save();
        }

        return $this->render('order', compact('model'));
    }

    public function actionOrderItem()
    {
        $model = new OrderItem();

        $userId = $_SESSION['__id'];
        $userBaskets = Oorder::getBasket($userId);
        $order = Oorder::getOrder($userId);



        return $this->render('order_item');
    }
}