<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sku}}`.
 */
class m240511_161423_create_sku_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sku}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'articul' => $this->string(),
            'count' => $this->integer(),
            'purchase_price' => $this->float()->notNull(),
            'sale_price' => $this->float()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression("NOW()"),
            'updated_at' => $this->dateTime()->defaultExpression("NOW()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sku}}');
    }
}
