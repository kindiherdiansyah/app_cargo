<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shipment */

$this->title = 'Update Data Shipment: ' . $model->shipment_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Shipment', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shipment_id, 'url' => ['view', 'id' => $model->shipment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shipment-update">

   <!--  <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
