<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class City extends ActiveRecord
{
    public static function tableName()
    {
        return 'cities';
    }

    public function getYura()
    {
        return $this->hasMany(Yura::class, ['city_id' => 'id']);
    }

}