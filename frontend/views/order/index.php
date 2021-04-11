<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap4\ActiveForm;
    use common\models\Tovar;

    $this->title ="Order";
    $this->params['breadcrumbs'][] = $this->title;

    $js = <<< JS
        $('.delete').click(function(){
            let id = $(this).attr('value');
            $.ajax({
                type: 'post',
                url: 'delete-article',
                data: {'id' : id, 
                    },
                success: function() {
                    $('.article-' + id).remove(); //jQuery
                    alert('Article has been delete');
                }
            })
        });

        $('.payment').click(function(){
            let order_id = $(this).attr('value');
            $.ajax({
                type: 'post',
                url: 'payment',
                data: {'order_id' : order_id, 
                    },
                success: function() {
                    alert('Your order are processing! Thank you!');
                }
            })
        });

    JS;
    $this->registerJS($js)

?>

<div class="m-4">
    <table class="table table-striped">
        <thead>
            <th>#</th>
            <th class="text-center">Tovar name</th>
            <th class="text-center">Count</th>
            <th class="text-center">Price</th>
            <th class="text-center">Total</th>
            <th class="text-center"></th>
        </thead>
        <tbody>
            <?php
                if ($itemOrders) {
                    $count = 1;
                    foreach ($itemOrders as $itemOrder) {
                        $tovar = Tovar::findOne(['id' => $itemOrder->tovar_id])
            ?>
                <tr scope="row" class="article-<?=$itemOrder->id?>">
                    <td><?=$count++?></td>
                    <td class="text-center"><?=$tovar->name?></td>
                    <td class="text-center"><?=$itemOrder->count?></td>
                    <td class="text-center"><?=$tovar->price?></td>
                    <td class="text-center">$ <?=($tovar->price) * ($itemOrder->count)?></td>
                    <td>
                        <div class="text-center">
                            <a href="#" class="btn btn-danger btn-sm delete w-50" role="button" aria-pressed="true" value ="<?=$itemOrder->id?>" >Delete</a>
                        </div>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
    <?php
        if ($itemOrders) {
    ?>
        <div class="d-flex justify-content-center mt-2">
            <a href="/" class="btn btn-success btn-sm mt-4 w-25 payment" role="button" aria-pressed="true" value ="<?=$itemOrder->order_id?>">Payment</a> 
        </div>
    <?php
        }
    ?>
</div>
