<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feature}}`.
 */
class m240511_160134_create_feature_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feature}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'another_name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feature}}');
    }
}
