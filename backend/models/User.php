<?php
    namespace backend\models;

    use Yii;
    use yii\db\ActiveRecord;

    /**
     * 
     * @property int $id
     * @property string $username
     * @property string $auth_key
     * @property string $password_hash
     * @property string $password_reset_token
     * @property string $email
     * @property int $status
     * @property int $created_at
     * @property int $updated_at
     * @property string $verification_token
     * 
     */

    class User extends ActiveRecord
    {
        public static function tableName()
        {
            return 'user';
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