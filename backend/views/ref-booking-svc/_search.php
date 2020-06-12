<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefBookingSvcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-booking-svc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SERVICE_ID') ?>

    <?= $form->field($model, 'SERVICE') ?>

    <?= $form->field($model, 'SHIPMENT_ID') ?>

    <?= $form->field($model, 'SERVICE_NAME') ?>

    <?= $form->field($model, 'SERVICE_DESC') ?>

    <?php // echo $form->field($model, 'SERVICE_STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
