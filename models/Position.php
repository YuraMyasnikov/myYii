<?php

namespace app\models;

use yii\db\ActiveRecord;

class Position extends ActiveRecord
{
    public static function tableName()
    {
        return 'position';
    }


    public function getYurans()
    {
        return $this->hasMany(Yura::class, ['position_id' => 'id']);
    }

    public function getWork()
    {
        return $this->hasOne(Work::class, ['id' => 'work_id']);
    }

}