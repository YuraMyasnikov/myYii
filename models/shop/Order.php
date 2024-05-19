<?php

namespace app\models\shop;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property int $sku_id
 * @property string $price
 * @property int $count
 * @property bool $status
 * @property string $adress
 * @property string $payment_method
 * @property  $created_at
 * @property  $updated_at
 */

class Order extends ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name','phone','created_at','updated_at'],'safe']
        ];
    }

}