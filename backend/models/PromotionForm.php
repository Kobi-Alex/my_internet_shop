<?php
namespace backend\models;

use yii\base\Model;

class PromotionForm extends Model
{
    public $name;
    public $description;
    public $imageFile;

    public function rules()
    {
        return [

            [['name', 'description'], 'string', 'message' => 'невірний тип поля'],
            [['name', 'description'], 'required', 'message' => 'значення обов\'язкове'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jfif', 'maxFiles' => 10],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'description' => 'Descriptions'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $result = [];
            foreach ($this->imageFile as $file) {
                $fileName = md5(microtime() . rand(0, 1000));
                $imagePath = '../../images/promotion/' . $fileName . '.' . $file->extension;
                $file->saveAs($imagePath);
                $result[] = $imagePath;
            }
            return $result;
        }
        return false;
    }
}