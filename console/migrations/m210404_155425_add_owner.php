<?php

use yii\db\Migration;

/**
 * Class m210404_155425_add_owner
 */
class m210404_155425_add_owner extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('owner');
        $auth->assign($adminRole, 4);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210404_155425_add_owner cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210404_155425_add_owner cannot be reverted.\n";

        return false;
    }
    */
}
