<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

 
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Track';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ta-booking-index">
<style type="text/css">
    .WarnaHeader table thead {
    background-color: #ffff66;
}
</style>

   <!--  <h1><FONT COLOR="#000000"><?= Html::encode($this->title) ?></h1> -->
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'options' => ['class' => 'WarnaHeader'],
        
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            
        [
            'label' => 'Booking ID',
            'value'=>'idCollecting.collecting_id',
        ],

        [
            'label' => 'Service',
            'value'=>'idCollecting.services',
        ],
            
        //     [
        // 'label' => 'Pengirim',
        // 'value' => function ($model) {
        // if($model)
        //     return ($model->idCollecting->sender_nm.' '.$model->idCollecting->sender_addr.', '.$model->idCollecting->sender_kota.' '. $model->idCollecting->sender_pos.' - '. $model->idCollecting->sender_telp);
        //      }
        // ],

        [
            'label' => 'Consignee',
            'value'=>'idCollecting.receiver_nm',
        ],

            [
        'label' => 'Destination',
        'value' => function ($model) {
        if($model)
            return ($model->idCollecting->receiver_addr.', '.$model->idCollecting->receiver_kota.' '. $model->idCollecting->receiver_pos.' - '. $model->idCollecting->receiver_telp);
             }
        ],

           
           [
        'label' => 'Booking Date',
        'attribute' =>'booking_date',
        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asDate($model->idCollecting->booking_date, 'dd-MM-Y H:i').' WIB';
            }
        ],

        [
            'label' => 'Status',
            'attribute' => 'idCollecting.c_status',
        ],

       

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
    
     
</div>
