<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefBookingSvcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Service';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-booking-svc-index panel panel-info">

    <div class="panel-heading">
        <h4><b><?= Html::encode($this->title) ?></b>
        <span class="pull-right">
            <?= Html::a('Create Data Service', ['create'], ['class' => 'btn btn-primary btn w3-btn w3-hover-aqua']) ?>
        </span>
        </h4>
    </div>

    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'SERVICE_ID',
            'SERVICE',
            'SHIPMENT_ID',
            'SERVICE_NAME',
            'SERVICE_DESC',

            [
            'label' => 'Status',
            'value' => function ($model) {
            if($model->SERVICE_STATUS == 1)
                return  'Active';
            else
                return 'Deactive';
                }
            ],

            ['class' => 'kartik\grid\ActionColumn','header'=>"Actions"],
        ],
    ]); ?>
    </div>
</div>
