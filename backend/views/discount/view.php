<?php

    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title ="View";
    $this->params['breadcrumbs'][] = ['label' => 'Discounds', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title?></h4>
    </div>
    
    <div class="media col-md-6">
        <div class="media-body media-left ">
            <h3 class="media-heading"><?=$discount->name?></h3>
            <h5 class="media-heading">Description:</h5>
            <div class="well well-sm">
                <?=$discount->description?>
            </div>
            <h5 class="media-heading">Discounds (%)</h5>
            <div class="well well-sm">
                <?=$discount->discount?>
            </div>
        </div>
    </div>
</div>