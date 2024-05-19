<?php

namespace app\widgets;

use yii\bootstrap5\Widget;

class ReviewWidget extends Widget
{
    public $review;

    public function run()
    {
        return $this->render('review', ['review' => $this->review]);
    }
}