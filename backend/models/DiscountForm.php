<?php
namespace backend\models;

use yii\base\Model;

class DiscountForm extends Model
{
    public $name;
    public $description;
    public $discount;

    public function rules()
    {
        return [
            [['name', 'description'], 'string', 'message' => 'невірний тип поля'],
            [['discount'], 'integer', 'min' => 0, 'max' => 80],
            [['name', 'description'], 'required', 'message' => 'значення обов\'язкове']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Discount type',
            'description' => 'Discount description',
        ];
    }
}