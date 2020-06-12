<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefBookingSvc */

$this->title = 'Update Data Service: ' . $model->SERVICE_ID.'-'.$model->SERVICE.'-'.$model->SHIPMENT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Data Service', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SERVICE_ID, 'url' => ['view', 'id' => $model->SERVICE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-booking-svc-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
