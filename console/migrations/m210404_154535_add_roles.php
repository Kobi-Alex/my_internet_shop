<?php

use yii\db\Migration;

/**
 * Class m210404_154535_add_roles
 */
class m210404_154535_add_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('manager'));
        $auth->add($auth->createRole('promotionManager'));
        $auth->add($auth->createRole('owner'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210404_154535_add_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210404_154535_add_roles cannot be reverted.\n";

        return false;
    }
    */
}
