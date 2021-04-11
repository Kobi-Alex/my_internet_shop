<?php
    namespace common\models;

    use Yii;
    use yii\db\ActiveRecord;

    /**
     * 
     * @property int $id
     * @property string $number
     * @property dateTime $date
     * @property string $status
     * @property int $user_id
     * 
     */

    class Order extends ActiveRecord
    {
        public static function tableName()
        {
            return 'orders';
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