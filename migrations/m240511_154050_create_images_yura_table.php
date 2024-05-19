<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images_yura}}`.
 */
class m240511_154050_create_images_yura_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images_yura}}', [
            'id' => $this->primaryKey(),
            'images' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->dateTime()->defaultExpression("NOW()"),
            'updated_at' => $this->dateTime()->defaultExpression("NOW()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%images_yura}}');
    }
}
