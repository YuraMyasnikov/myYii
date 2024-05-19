<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int|null $sku_id
 * @property string|null $price
 * @property int|null $count
 * @property int|null $product_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $order_id
 * @property int|null $user_id
 *
 * @property Order $order
 * @property Product $product
 * @property Sku $sku
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sku_id', 'count', 'product_id', 'order_id', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['price'], 'string', 'max' => 50],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['sku_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sku::class, 'targetAttribute' => ['sku_id' => 'id']],
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
            'price' => 'Price',
            'count' => 'Count',
            'product_id' => 'Product ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[Sku]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSku()
    {
        return $this->hasOne(Sku::class, ['id' => 'sku_id']);
    }
}
