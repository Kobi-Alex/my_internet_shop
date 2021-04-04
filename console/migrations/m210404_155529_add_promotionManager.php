<?php

use yii\db\Migration;

/**
 * Class m210404_155529_add_promotionManager
 */
class m210404_155529_add_promotionManager extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('promotionManager');
        $auth->assign($adminRole, 5);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210404_155529_add_promotionManager cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210404_155529_add_promotionManager cannot be reverted.\n";

        return false;
    }
    */
}
