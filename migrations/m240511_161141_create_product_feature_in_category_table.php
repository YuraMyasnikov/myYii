<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_feature_in_category}}`.
 */
class m240511_161141_create_product_feature_in_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_feature_in_category}}', [
            'id' => $this->primaryKey(),
            'p_f_category_id' => $this->integer(),
            'p_f_feature_id' => $this->integer(),
            'created_at' => $this->dateTime()->defaultExpression("NOW()"),
            'updated_at' => $this->dateTime()->defaultExpression("NOW()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_feature_in_category}}');
    }
}
