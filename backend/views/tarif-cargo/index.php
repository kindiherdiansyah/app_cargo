<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TarifCargoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Tarif';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-cargo-index panel panel-info">

    <div class="panel-heading">
        <h4><b><?= Html::encode($this->title) ?></b>
        <span class="pull-right">
            <?= Html::a('Create Data Tarif', ['create'], ['class' => 'btn btn-primary btn w3-btn w3-hover-aqua']) ?>
        </span>
        </h4>
    </div>

    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\CheckboxColumn'],
            ['class' => 'yii\grid\SerialColumn'],

            // 'tcargo_id',
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

            ['class' => 'kartik\grid\ActionColumn','header'=>"Actions"],
        ],
    ]); ?>
    
    </div>
</div>
