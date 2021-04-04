<?php

// use Yii;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title ="View";
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title?></h4>
    </div>
    
    <div class="media col-md-6">
        <div class="media-body media-left ">
            <h5 class="media-heading">Name:</h5>
            <div class="well well-sm">
                <?=$category->name?>
            </div>
            <h5 class="media-heading">Discription</h5>
            <div class="well well-sm">
                <?=$category->description?>
            </div>
        </div>
    </div>
</div>