<?php

    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title ="View";
    $this->params['breadcrumbs'][] = ['label' => 'Tovar', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title?></h4>
    </div>
    
    <div class="media">
        <div class="media-left media-middle col-md-3 ">
            <?php
                foreach ($images as $image) {
                    ?>
                <div class="text-center row-sm-3" style="margin-bottom: 10px">
                    <img class="img-rounded" src="/<?=$image?>" alt="Piston" width="160" height="140">
                </div>
            <?php
                }
            ?>
        </div>
        <div class="media-body media-left">
            <h3 class="media-heading"><?=$tovar->name?></h3>
            <hr>
            <h4 class="media-heading">Main arguments:</h4>
            <h5 class="media-heading">Description:</h5>
            <div class="well well-sm">
                <?=$tovar->description?>
            </div>
            <h5 class="media-heading">Available item (pcs)</h5>
            <div class="well well-sm">
                <?=$tovar->count?>
            </div>
            <h5 class="media-heading">Price: (per item $)</h5>
            <div class="well well-sm">
                <?=$tovar->price?>
            </div>
            <hr>
            <?php
                if ($discount != Null){
            ?>
            <h4 class="media-heading">Discount arguments:</h4>
            <h5 class="media-heading">Type:</h5>
            <div class="well well-sm">
                <?=$discount->name?>
            </div>
            <h5 class="media-heading">Interest (%)</h5>
            <div class="well well-sm">
                <?=$discount->discount?>
            </div> 
            <?php 
                } 
            ?>
        </div>
        <div>
        <hr>

        </div>
    </div>
</div>
