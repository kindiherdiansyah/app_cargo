<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProcessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="process-search">
    <div class="panel panel-info">
        <div class="panel-heading" align="center">
            <h2>
                <b><?= $this->title ?></b>
            </h2>
        </div>

    <?php $form = ActiveForm::begin([
        'action' => ['lihat'],
        'method' => 'get',
    ]); ?>
    <div class="panel-body">
    <center><img src="image/favicon.png" width="150" height="110"/> 
    <br>
    <br>
    </center>

    <center>
    <?= $form->field($model, 'collecting_id')->textInput(['placeholder' => "Booking Code",'required' => true,'style'=>'width:500px','maxlength' => true, 'autocomplete' => 'off'])->label('Cari Kode Booking') ?>

   <!--  <?= $form->field($model, 'process_id') ?> -->

<!--     <?= $form->field($model, 'collecting_id') ?>

    <?= $form->field($model, 'berat') ?>

    <?= $form->field($model, 'harga') ?>

    <?= $form->field($model, 'total') ?> -->

    <?php // echo $form->field($model, 'process_date') ?>

    <?php // echo $form->field($model, 'p_status') ?>

    <?php // echo $form->field($model, 'nama_driver') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-danger']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
<hr>
</div>
