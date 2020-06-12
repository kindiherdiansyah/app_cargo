<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipment-form">
<div class="panel panel-info">
	<div class="panel-heading">
            <h4>
                <b><?= $this->title ?></b>
                <span class="pull-right">
                    <?= Html::a('Kembali', ['index'], ['class' => 'btn w3-btn w3-hover-light-grey']) ?>
                </span>
            </h4>
    </div>

    <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shipment_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipment_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipment_desc')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
