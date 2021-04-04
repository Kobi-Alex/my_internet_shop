<?php
namespace backend\models;

use yii\base\Model;

class UserForm extends Model
{
    public $username;
    public $email;

    public function rules()
    {
        return [
            [['username', 'email'], 'string', 'message' => 'невірний тип поля'],
            [['username', 'email'], 'required', 'message' => 'значення обов\'язкове']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'User name',
            'email' => 'E-mail'
        ];
    }
}