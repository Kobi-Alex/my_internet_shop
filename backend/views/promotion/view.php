<?php

    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title ="View";
    $this->params['breadcrumbs'][] = ['label' => 'Promotions', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title?></h4>
    </div>
    
    <div class="container col-md-12">
        <div class="row"> 
            <?php
                foreach ($images as $image) {
                    ?>
                <div style="margin: 15px 0 15px 0" class="col-md-3">
                    <img class="img-rounded center-block img-thumbnail" src="/<?=$image?>" alt="" width="200" height="">
                </div>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <h5 class="media-heading">Name:</h5>
            <div class="well well-sm">
                <?=$promotion->name?>
            </div>
            <h5 class="media-heading">Description:</h5>
            <div class="well well-sm">
                <?=$promotion->description?>
            </div>
            <hr>
        </div>
    </div>
</div>
