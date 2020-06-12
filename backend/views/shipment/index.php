<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ShipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Shipment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipment-index panel panel-info">

    <div class="panel-heading">
        <h4><b><?= Html::encode($this->title) ?></b>
        <span class="pull-right">
            <?= Html::a('Create Data Shipment', ['create'], ['class' => 'btn btn-primary btn w3-btn w3-hover-aqua']) ?>
        </span>
        </h4>
    </div>

    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'shipment_id',
            'shipment_name',
            'shipment_desc:ntext',

            ['class' => 'kartik\grid\ActionColumn',
             'header'=>"Actions"
            ],
        ],
    ]); ?>
    </div>
</div>
