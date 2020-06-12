<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TarifCargoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-cargo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tcargo_id') ?>

    <?= $form->field($model, 'shipment_id') ?>

    <?= $form->field($model, 'service_id') ?>

    <?= $form->field($model, 'origin') ?>

    <?= $form->field($model, 'origin_name') ?>

    <?php // echo $form->field($model, 'destination') ?>

    <?php // echo $form->field($model, 'destination_name') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'rate_cube') ?>

    <?php // echo $form->field($model, 'admin_fee') ?>

    <?php // echo $form->field($model, 'lead_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
