<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discounts}}`.
 */
class m210403_154913_create_discounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discounts}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'discount' => $this->integer()->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%discounts}}');
    }
}
