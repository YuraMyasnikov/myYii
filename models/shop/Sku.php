<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "sku".
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $articul
 * @property int $count
 * @property float $purchase_price
 * @property float $sale_price
 *
 * @property OrderItem[] $orderItems
 * @property Product $product
 */
class Sku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'count'], 'integer'],
            [['purchase_price', 'sale_price'], 'number'],
            [['articul'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'articul' => 'Articul',
            'count' => 'Count',
            'purchase_price' => 'Purchase Price',
            'sale_price' => 'Sale Price',
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['sku_id' => 'id']);
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
}
