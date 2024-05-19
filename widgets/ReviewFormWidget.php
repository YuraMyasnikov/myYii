<?php

namespace app\widgets;

use yii\bootstrap5\Widget;

class ReviewFormWidget extends Widget
{
    public $model;
    public $product;
    public $user;

    public function run()
    {
        return $this->render('reviewForm', ['model' => $this->model, 'product' => $this->product , 'user' => $this->user]);
    }

}