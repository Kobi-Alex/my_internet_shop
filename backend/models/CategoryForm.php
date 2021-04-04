<?php
namespace backend\models;

use yii\base\Model;

class CategoryForm extends Model
{
    public $name;
    public $description;

    public function rules()
    {
        return [
            [['name', 'description'], 'string', 'message' => 'невірний тип поля'],
            [['name', 'description'], 'required', 'message' => 'значення обов\'язкове']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Category name',
            'description' => 'Category description',
        ];
    }
}