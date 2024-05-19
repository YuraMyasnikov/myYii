<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m240511_155502_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'brand_id' => $this->integer(),
            'name' => $this->string(),
            'mark' => $this->string(),
            'price' => $this->float(),
            'active' => $this->boolean(),
            'image' => $this->string(),
            'created_at' => $this->dateTime()->defaultExpression("NOW()"),
            'updated_at' => $this->dateTime()->defaultExpression("NOW()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
