<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_orders}}`.
 */
class m210410_190253_create_item_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item_orders}}', [
            'id' => $this->primaryKey(),
            'count' => $this->integer()->defaultValue(0),
            'tovar_id' => $this->integer()->notNull(),
            'order_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%item_orders}}');
    }
}
