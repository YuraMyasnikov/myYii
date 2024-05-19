<?php

namespace app\models;

use yii\db\ActiveRecord;

class ImagesYura extends ActiveRecord
{
    public static function tableName()
    {
        return 'images_yura';
    }

    public function getYura()
    {
        return $this->hasOne(Yura::class, ['id' => 'user_id']);
    }

}