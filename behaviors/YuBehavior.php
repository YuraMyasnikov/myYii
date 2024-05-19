<?php

namespace app\behaviors;

use yii\base\Behavior;

class YuBehavior extends Behavior
{
    public $prop1 = '234';

    private $_prop2;

    public function getProp2()
    {
        return $this->_prop2;
    }

    public function setProp2($value)
    {
        $this->_prop2 = $value;
    }

    public function foo()
    {

    }
}