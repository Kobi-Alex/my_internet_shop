<?php

use yii\db\Migration;

/**
 * Class m210404_155326_add_manager
 */
class m210404_155326_add_manager extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('manager');
        $auth->assign($adminRole, 3);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210404_155326_add_manager cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210404_155326_add_manager cannot be reverted.\n";

        return false;
    }
    */
}
