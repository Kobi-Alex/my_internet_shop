<?php
namespace frontend\models;

use yii\base\Model;

class OrderForm extends Model
{
    public $number;
    public $status;
    public $user_id;

    public function rules()
    {
        return [
            [['number', 'status'], 'string', 'message' => 'невірний тип поля'],
            [['user_id'], 'int', 'message' => 'невірний тип поля'],
            [['number', 'status', 'user_id'], 'required', 'message' => 'значення обов\'язкове']
        ];
    }

    public function attributeLabels()
    {
        return [];
    }
}