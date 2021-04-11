<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

?>

<div class="site-index my-3">

    <div class="row">
        
        <div class="col-3 rounded-lg mx-4 shadow-sm">

            <h6 class="text-center mt-4 text-muted ">CATEGORIES</h6> 
            <div class="tovar-content mt-3">
                <?php
                    foreach ($categories as $category) {
                ?>
                    <a href="<?=Url::to(['/shop/'. $category->id . '/index'])?>" class="btn btn-outline-info btn-sm w-100 my-1" style="font-size: 15px" role="button"><?=$category->name?></a>
                <?php 
                    }
                ?>
            </div>
        </div>
        
        <div class="col-8 rounded-lg ml-2 shadow-sm">

            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner rounded-lg mt-3">
                    <?php
                        $count = 1;
                        foreach ($promotions as $promotion) {
                            $image = json_decode($promotion->url_image, true);
                            if ($count++ == 1) {
                    ?>
                        <div class="carousel-item active" data-interval="5000">
                            <img src="/<?=$image[0]?>" class="d-block w-100" alt="...">
                        </div>
                    <?php
                        } else if ($count++ == 2) {
                    ?>
                        <div class="carousel-item" data-interval="2000">
                            <img src="/<?=$image[0]?>" class="d-block w-100" alt="...">
                        </div>
                    <?php
                        } else {
                    ?>
                        <div class="carousel-item">
                            <img src="/<?=$image[0]?>" class="d-block w-100" alt="...">
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <hr>
            <div class="tovar-content d-flex justify-content-around flex-wrap">
                <?php
                    foreach ($tovars as $tovar) {
                        $images = json_decode($tovar->url_image, true);
                ?>
                    <div class="card m-2 shadow-sm" style="width: 15rem; ">
                        <img src="/<?=$images[0]?>" class="card-img-top" alt="..." height="">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?=$tovar->name?></h5>
                            <p class="card-text"><?=$tovar->description?></p>
                            <div class="mt-auto w-100">
                                <hr>
                                <a href="<?=Url::to(['/shop/'. $tovar->id . '/view'])?>" class="btn btn-dark w-100 btn-sm">Price: $ <?=$tovar->price?></a>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</div>