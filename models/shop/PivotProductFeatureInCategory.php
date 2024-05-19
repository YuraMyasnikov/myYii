<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "product_feature_in_category".
 *
 * @property int $id
 * @property int $p_f_category_id
 * @property int $p_f_feature_id
 *
 * @property Categories $pFCategory
 */
class PivotProductFeatureInCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_feature_in_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_f_category_id', 'p_f_feature_id'], 'integer'],
            [['p_f_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['p_f_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'p_f_category_id' => 'P F Category ID',
            'p_f_feature_id' => 'P F Feature ID',
        ];
    }

    /**
     * Gets query for [[PFCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPFCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'p_f_category_id']);
    }

    public function getFeature()
    {
        return $this->hasMany(Feature::class, ['id' => 'p_f_feature_id']);
    }
}
