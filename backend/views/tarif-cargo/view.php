<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TarifCargo */

$this->title = 'Tarif : '."From"." ".$model->origin_name." "."To"." ".$model->destination_name;
$this->params['breadcrumbs'][] = ['label' => 'Data Tarif', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-cargo-view panel panel-info">

    <div class="panel-heading">
            <h3>
                <span class="pull-right">
                    <?= Html::a('Kembali', ['index'], ['class' => 'btn w3-btn w3-hover-light-grey']) ?>
                </span>
                <center><b><?= $this->title ?></b></center>
            </h3>
    </div>

    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tcargo_id',
            'shipment_id',
            'service_id',
            'origin',
            'origin_name',
            'destination',
            'destination_name',
            'rate',
            'rate_cube',
            'admin_fee',
            'lead_time',
        ],
    ]) ?>
        <center><span class="form-group">
            <p>
            <?= Html::a('Update', ['update', 'id' => $model->tcargo_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->tcargo_id], [
                'class' => 'btn btn-danger',
                'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
                ],
            ]) ?>
            </p>
        </span></center>
    </div>
</div>
