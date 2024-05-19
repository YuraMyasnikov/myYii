<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m240511_091026_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
            'text' => $this->string(),
            'active' => $this->boolean(),
            'image' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
