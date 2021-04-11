<?php
    namespace common\models;

    use Yii;
    use yii\db\ActiveRecord;

    /**
     * 
     * @property int $id
     * @property int $count
     * @property int $tovar_id
     * @property int $order_id
     * 
     */

    class ItemOrder extends ActiveRecord
    {
        public static function tableName()
        {
            return 'item_orders';
        }

        public function rules()
        {
            return [];
        }

        public function attributeLabel()
        {
            return[];
        }
    }