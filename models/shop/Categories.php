<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $text
 * @property bool|null $active
 * @property string|null $image
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property PivotProductFeatureInCategory[] $productFeatureInCategories
 * @property Product[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['text'], 'string'],
            [['active'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'text' => 'Text',
            'active' => 'Active',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ProductFeatureInCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductFeaturiesInCategory()
    {
        return $this->hasMany(PivotProductFeatureInCategory::class, ['p_f_category_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }
}
