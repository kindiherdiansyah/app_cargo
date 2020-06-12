<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kantor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kantor-form">
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

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
