<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $brand_id
 * @property string|null $name
 * @property string|null $mark
 * @property float|null $price
 * @property bool|null $active
 * @property string|null $image
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Brand $brand
 * @property Categories $category
 * @property ProductFeature[] $productFeatures
 * @property Reviews[] $reviews
 * @property Sku[] $skus
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'brand_id'], 'integer'],
            [['price'], 'number'],
            [['active'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'mark', 'image'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brand_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'brand_id' => 'Brand ID',
            'name' => 'Название',
            'mark' => 'Модель',
            'price' => 'Цена',
            'active' => 'Active',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductFeatures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductFeatures()
    {
        return $this->hasMany(ProductFeature::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::class, ['reviews_product' => 'id']);
    }

    /**
     * Gets query for [[Skus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSkues()
    {
        return $this->hasMany(Sku::class, ['product_id' => 'id']);
    }


    public function getFeatures()
    {
        return $this->hasMany(Feature::class, ['id' => 'feature_id'])->viaTable('product_feature', ['product_id' => 'id']);
    }
}
