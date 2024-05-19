<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $reviews_product
 * @property string|null $like
 * @property string|null $dislike
 * @property string $text
 * @property int|null $status
 * @property string|null $images
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Product $reviewsProduct
 * @property User $user
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'reviews_product', 'status'], 'integer'],
            [['text'], 'required'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['like'], 'string', 'max' => 50],
            [['dislike', 'images'], 'string', 'max' => 255],
            [['reviews_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['reviews_product' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'reviews_product' => 'Reviews Product',
            'like' => 'Достоинства',
            'dislike' => 'Недостатки',
            'text' => 'Коментарий',
            'status' => 'Status',
            'images' => 'Images',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ReviewsProduct]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewsProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'reviews_product']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
