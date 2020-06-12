<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefBookingSvc */

$this->title = 'Service : '.$model->SERVICE.'-'.$model->SHIPMENT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Data Service', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-booking-svc-view panel panel-info">
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
            'SERVICE_ID',
            'SERVICE',
            'SHIPMENT_ID',
            'SERVICE_NAME',
            'SERVICE_DESC',
             [
            'label' => 'Status',
            'attribute'=>'SERVICE_STATUS',
            'value' => function ($model) {
            if($model->SERVICE_STATUS==0)
                return 'Deactive';
            else 
                return 'Active';
            }
            ],
        ],
    ]) ?>

        <center><span class="form-group">
            <p>
            <?= Html::a('Update', ['update', 'id' => $model->SERVICE_ID], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->SERVICE_ID], [
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
