<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brands}}`.
 */
class m240511_120604_create_brands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%brands}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string(),
            'active' => $this->boolean()->defaultValue(0),
            'created_at' => $this->dateTime()->defaultExpression("NOW()"),
            'updated_at' => $this->dateTime()->defaultExpression("NOW()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%brands}}');
    }
}
