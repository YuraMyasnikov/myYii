<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reviews}}`.
 */
class m240511_121233_create_reviews_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reviews}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'reviews_product' => $this->integer(),
            'like' => $this->string(),
            'dislike' => $this->string(),
            'text' => $this->string(),
            'status' => $this->integer(),
            'images' => $this->string(),
            'created_at' => $this->dateTime()->defaultExpression("NOW()"),
            'updated_at' => $this->dateTime()->defaultExpression("NOW()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reviews}}');
    }
}
