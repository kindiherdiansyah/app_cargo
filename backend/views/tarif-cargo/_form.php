<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Shipment;
use app\models\RefBookingSvc;

/* @var $this yii\web\View */
/* @var $model app\models\TarifCargo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-cargo-form">
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

    <div class="col-md-6"  style="margin-bottom: 8px;">

    <?= $form->field($model, 'service_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(RefBookingSvc::find()->all(),'SERVICE',function($model){return ($model->SERVICE.' ('.$model->SERVICE_NAME.')');}),
    'theme' => Select2::THEME_BOOTSTRAP,
    'language' => 'en',
    'options' => ['placeholder' => 'Pilih Shipment','required' => true,'style'=>'width:500px','maxlength' => true],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]);
    ?>

 <!--    <?= $form->field($model, 'service_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(RefBookingSvc::find()->all(),'SERVICE','SERVICE'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Service'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?> -->

    <?= $form->field($model, 'origin')->textInput(['maxlength' => true])->label('Postal Code Origin') ?>

    <?= $form->field($model, 'origin_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => true])->label('Postal Code Destination') ?>

    <?= $form->field($model, 'destination_name')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-6"  style="margin-bottom: 8px;">

    <?= $form->field($model, 'shipment_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Shipment::find()->all(),'shipment_id',function($model){return ($model->shipment_id.' ('.$model->shipment_desc.')');}),
    'theme' => Select2::THEME_BOOTSTRAP,
    'language' => 'en',
    'options' => ['placeholder' => 'Pilih Shipment','required' => true,'style'=>'width:500px','maxlength' => true],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]);
    ?>

 <!--    <?= $form->field($model, 'shipment_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(RefBookingSvc::find()->all(),'SHIPMENT_ID','SHIPMENT_ID'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Shipment'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?> -->

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'rate_cube')->textInput() ?>

    <?= $form->field($model, 'admin_fee')->textInput() ?>

    <?= $form->field($model, 'lead_time')->textInput() ?>
    </div>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>

