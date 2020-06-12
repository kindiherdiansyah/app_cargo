<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Shipment;

/* @var $this yii\web\View */
/* @var $model app\models\RefBookingSvc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-booking-svc-form">
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

    <?= $form->field($model, 'SHIPMENT_ID')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Shipment::find()->all(),'shipment_id',function($model){return ($model->shipment_id.' ('.$model->shipment_desc.')');}),
    'theme' => Select2::THEME_BOOTSTRAP,
    'language' => 'en',
    'options' => ['placeholder' => 'Pilih Shipment','required' => true,'style'=>'width:500px','maxlength' => true],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]);
    ?>

    <?= $form->field($model, 'SERVICE')->textInput(['maxlength' => true]) ?>

  <!--   <?= $form->field($model, 'SHIPMENT_ID')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Shipment::find()->all(),'shipment_id','shipment_id'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Shipment'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?> -->

    <?= $form->field($model, 'SERVICE_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SERVICE_DESC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SERVICE_STATUS')->radioList([1 => 'Active', 0 => 'Deactive'])->label('Status'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
