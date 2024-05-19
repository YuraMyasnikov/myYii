<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%udali}}`.
 */
class m240517_100717_create_udali_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%udali}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%udali}}');
    }
}
