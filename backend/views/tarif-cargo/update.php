<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TarifCargo */

$this->title = 'Update Data Tarif : ' . $model->tcargo_id.'- From '.$model->origin_name.' '.'To'.' '.$model->destination_name;
$this->params['breadcrumbs'][] = ['label' => 'Data Tarif', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tcargo_id, 'url' => ['view', 'id' => $model->tcargo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tarif-cargo-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1>
 -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
