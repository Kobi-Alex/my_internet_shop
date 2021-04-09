<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap4\ActiveForm;

    $this->title ="View";
    $this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="" style="margin: 50px 0 0 0;">
    <div class="media">
        <div class="media-left media-middle col-md-4 mt-3">
            <?php
                foreach ($images as $image) {
                    ?>
                <div class="text-center row-sm-3" style="margin-bottom: 10px">
                    <img class="img-rounded" src="/<?=$image?>" alt="" width="160" height="140">
                </div>
            <?php
                }
            ?>
        </div>
        <div class="col-md-7">
            <h1 class="media-heading"><?=$tovar->name?></h1>
            <hr>
            <h4 class="media-heading">Main arguments:</h4>
            <h5 class="media-heading mb-0">Description:</h5>
            <div class="mb-3">
                <?=$tovar->description?>
            </div>
            <h5 class="media-heading mb-0">Available item (pcs):</h5>
            <div class="mb-3">
                <?=$tovar->count?>
            </div>
            <?php
                if ($discount == NULL) {
            ?>
                <hr>
                <h4 class="media-heading">Price (per item):</h4>
                <div class="mb-3 text-success font-weight-bold" style="font-size: 30px">
                    $ <?=$tovar->price?>
                </div>
            <?php
                } else {
            ?>
                <h5 class="media-heading mb-0">Discount (%): </h5>
                <div class="mb-3">
                    <?=$discount->discount?>
                </div>
                <hr>
                <h4 class="media-heading">Price (per item): <s>$ <?=$tovar->price?></s></h4>
                <div class="mb-3 text-success font-weight-bold" style="font-size: 30px">
                    $ <?=$tovar->price - ($tovar->price * $discount->discount)/100?>
                </div>
            <?php 
                } 
            ?>
            <a href="#" class="btn btn-success w-25 btn-sm mb-3"><h6>Buy</h6></a>
        </div>

    </div>
</div>
