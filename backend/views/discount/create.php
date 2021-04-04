<?php

    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title ="Create discount";
    $this->params['breadcrumbs'][] = ['label' => 'Discounts', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title?></h4>
    </div>
    <?php
        $form = ActiveForm::begin(['id' => 'discount-create']);
    ?>
    <div class="panel-body">
        <div class='row'>
            <div class="col-md-12">
                <?=$form->field($model, 'name')->textInput();?>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-12">
                <?=$form->field($model, 'description')->textarea(['row' => '2']);?>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-6">
                <?=$form->field($model, 'discount')->textInput(['type' => 'number', 'min' => 0, 'max' => 80, 'step' => '1']);?>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12">
                <?= Html::submitButton('Create', ['class' => 'btn btn-success btn-block'])?>
            </div>
        </div>
    </div>
    <?php
        ActiveForm::end();
    ?>
</div>