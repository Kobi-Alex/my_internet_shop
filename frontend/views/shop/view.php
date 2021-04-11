<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap4\ActiveForm;

    $this->title ="View";
    $this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

    $js = <<< JS

        $('#input-qnt').change(function(){
            var value = document.getElementById('input-qnt').value;
            var price = value * $('#price').attr('value');
            $('#price').html('$ ' + price.toFixed(2));
        });

        $('#buy').click(function(){
            document.getElementById('exampleModalLabelUpdate').innerHTML = 'CREATE NEW ORDER';
            $('#myModalUpdate').modal('show');

            document.getElementById('save').onclick = function ()
            {
                $('#myModalUpdate').modal('hide');
                var tovar_id = document.getElementById('save').value;
                var tovar_count = document.getElementById('input-qnt').value;
                $.ajax({
                    type: 'post',
                    url: 'add-order',
                    data: {
                        'tovar_id': tovar_id, 
                        'tovar_count': tovar_count, 
                    },
                    success: function() {
                        alert('Item add to order');
                    }
                });
            }
        });
    JS;
    $this->registerJS($js)
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
            <?php
                if (Yii::$app->user->id) {
            ?>
                <button class="btn btn-success w-25 btn-sm mt-3 mb-4" id='buy'><h5>Buy</h5></button>
            <?php
                } else {
            ?>
                <button class="btn btn-success w-25 btn-sm mt-3 mb-4" disabled id='buy'><h5>Please login</h5></button>
            <?php
                }
            ?>
        </div>
    </div>

    <div class="modal fade" id="myModalUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpdate" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelUpdate">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body update" id="modal-body">
                    <div>
                        <label for="" class="pr-2 font-weight-bold" value=>Name:</label> <?=$tovar->name?>
                    </div>
                    <div>
                        <label for="" class="pr-3 font-weight-bold">Price:</label> $ <?=$tovar->price?>
                    </div>
                    <div id="count-item">
                        <label for="" class="mr-1 font-weight-bold">Qnt:</label>
                        <input type="number" id="input-qnt" value="1"  class="container-text m-3 w-20" min="1" max="<?=$tovar->count?>">
                    </div>
                    <div class="font-weight-bold" >
                        <hr>
                        <label for="" class=""><h4>Total: </h4></label>
                        <span class="ml-2 text-success" style="font-size: 30px" id="price" value="<?=$tovar->price?>">$ <?=$tovar->price?> </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                    <button type="button" class="btn btn-primary" id="save" value="<?=$tovar->id?>">Add order</button>
                </div>
            </div>
        </div>
    </div>
</div>