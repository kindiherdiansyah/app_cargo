<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Shipment */

$this->title = 'Shipment Code : '.$model->shipment_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Shipment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipment-view panel panel-info">
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
            'shipment_id',
            'shipment_name',
            'shipment_desc:ntext',
        ],
    ]) ?>

        <center><span class="form-group">
            <p>
            <?= Html::a('Update', ['update', 'id' => $model->shipment_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->shipment_id], [
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
