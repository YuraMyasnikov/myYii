<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "basket".
 *
 * @property int $id
 * @property int $sku_id
 * @property int $count
 * @property int|null $price
 * @property int|null $product_id
 * @property int|null $user_id
 */
class Basket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basket';
    }

    public static function make():self
    {
        return new self();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sku_id', 'count', 'price', 'product_id', 'user_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sku_id' => 'Sku ID',
            'count' => 'Count',
            'price' => 'Price',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
        ];
    }
}
