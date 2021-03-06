<?php

use yii\db\Migration;

/**
 * Class m210330_134952_add_roles
 */
class m210330_134952_add_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('admin'));
        $auth->add($auth->createRole('user'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210330_134952_add_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210330_134952_add_roles cannot be reverted.\n";

        return false;
    }
    */
}
