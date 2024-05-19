<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%yura}}`.
 */
class m240511_084150_create_yura_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%yura}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'description' => $this->string(),
            'image' => $this->string(),
            'images' => $this->string(),
            'city_id' => $this->integer(),
            'busy' => $this->boolean(),
            'position_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%yura}}');
    }
}
