<?php

namespace app\models;

use yii\db\ActiveRecord;

class Work extends ActiveRecord
{
    public static function tableName()
    {
        return 'work';
    }

    public function getPositions()
    {
        return $this->hasMany(Position::class, ['work_id' => 'id']);
    }
}