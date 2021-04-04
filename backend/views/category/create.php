<?php

    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\Url;
    // use kartik\select2\Select2;

    $this->title ="Create Category";
    $this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title?></h4>
    </div>
    <?php
        $form = ActiveForm::begin(['id' => 'category-create']);
    ?>
    <div class="panel-body">
        <div class='row'>
            <div class="col-md-12">
                <?=$form->field($model, 'name')->textInput();?>
            </div>
        </div>
        <div class='row'>
            <div class="col-md-12">
                <?=$form->field($model, 'description')->textarea(['row' => '3']);?>
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