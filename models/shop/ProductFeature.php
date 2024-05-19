<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "product_feature".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $feature_id
 * @property string|null $value
 *
 * @property Feature $feature
 * @property Product $product
 */
class ProductFeature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_feature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'feature_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['feature_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feature::class, 'targetAttribute' => ['feature_id' => 'id']],
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
            'feature_id' => 'Feature ID',
            'value' => 'Value',
        ];
    }

    /**
     * Gets query for [[Feature]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeature()
    {
        return $this->hasOne(Feature::class, ['id' => 'feature_id']);
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
