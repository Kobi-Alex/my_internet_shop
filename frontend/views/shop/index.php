<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

// $this->title = 'Shop';
// $this->params['breadcrumbs'][] = $this->title;
// var_dump($tovars);
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
                    <div class="carousel-item active" data-interval="5000">
                    <img src="/../images/promotion/4d13cebd1cd3ff59f07bc4ca789fe1bb.jpg" class="d-block w-100" alt="..." height="">
                    </div>
                    <div class="carousel-item" data-interval="2000">
                    <img src="/../images/promotion/05b8eca8da3dc8e9ee79e73705ba6e64.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="/../images/promotion/3566882f37d8fcf96c16fcd8e2259f26.jpg" class="d-block w-100" alt="...">
                    </div>
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
            <div class="tovar-content d-flex justify-content-around">
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
                                <a href="<?=Url::to(['/shop/'. $tovar->id . '/view'])?>" class="btn btn-dark w-100 btn-sm">Buy: $ <?=$tovar->price?></a>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                ?>
            </div>
            

        </div>
    </div>

    <!-- <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

    <!-- <div class="body-content">
        <div class="row">
            <div class="col-lg-4 bg-light rounded-lg">
                <h5>Categories</h5> -->
                <!-- <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            <!-- </div> -->
            <!-- <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div> -->
            <!-- <div class="col-lg-8">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>-->
</div>
