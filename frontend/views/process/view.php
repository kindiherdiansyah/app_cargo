<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Track;
use app\models\Process;

// $connect = new PDO("mysql:host=localhost;dbname=project", "root", "");
// $query = "SELECT * FROM track ORDER BY track_id ASC";

// $statement = $connect->prepare($query);

// $statement->execute();

// $result = $statement->fetchAll();
// $model = $this->findModel($id);
// $hotel = Track::find()->where(['collecting_id' => $model->collecting_id]);
// $dataProvider1 = new ActiveDataProvider([
//     'query' => $hotel,
// ]);

$posts = Track::find()->where(['collecting_id' => $model->collecting_id])
    ->all();

$dataProvider = new ActiveDataProvider([
    'query' => Track::find()->where(['collecting_id' => $model->collecting_id]),
   
]);
// $rows = Process::find()->where(['collecting_id' => $model->collecting_id]);
// $statustrack = Yii::$app->request->get('status');
// $tanggaltrack = Yii::$app->request->get('track');

/* @var $this yii\web\View */
/* @var $model frontend\models\Process */

$this->title = 'Booking Code :'.' '. $model->collecting_id;
$this->params['breadcrumbs'][] = ['label' => 'Track', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="process-view">

    <h1><i><p align="center"><strong><FONT COLOR="navy"><?= Html::encode($this->title) ?></FONT></strong></p></i></h1>

<div class="container-fluid ">
    <hr>
<div class="col-lg-6">
    <b><p align="left"><center><font size="4">Data Pengirim</font></center></p></b>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
            'label' => 'Nama Pengirim',
            'value'=>($model->idCollecting->sender_nm),
            ],
            
            [
            'label' => 'Alamat Pengirim',
            'value' => function ($model) {
                if($model)
                return ($model->idCollecting->sender_addr.', '.$model->idCollecting->sender_kota.' '. $model->idCollecting->sender_pos);
                }
            ],

            [
            'label' => 'Telepon Pengirim',
            'value'=>($model->idCollecting->sender_telp),
            ],
        ],
    ]) ?>

</div>

<div class="col-lg-6">
    <b><p align="left"><center><font size="4">Data Penerima</font></center></p></b>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            [
            'label' => 'Nama Penerima',
            'value'=>($model->idCollecting->receiver_nm),
            ],
            
            [
            'label' => 'Alamat Penerima',
            'value' => function ($model) {
                if($model)
                return ($model->idCollecting->receiver_addr.', '.$model->idCollecting->receiver_kota.' '. $model->idCollecting->receiver_pos);
                }
            ],

            [
            'label' => 'Telepon Penerima',
            'value'=>($model->idCollecting->receiver_telp),
            ],

        ],
    ]) ?>
</div>

<div class="col-lg-12">
   <b><p align="left"> <center><font size="4">Data Barang</font></center></p></b>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'nama_driver',
            [
            'label' => 'Booking ID',
            'value'=>$model->idCollecting->collecting_id,
            ],

            [
            'label' => 'Service',
            'value'=>$model->idCollecting->services,
            ],

            [
            'label' => 'Konten',
            'value'=>$model->idCollecting->barang,
            ],

            [
            'label' => 'Harga Barang',
            'format' => 'Currency',
            'value'=>$model->idCollecting->harga_barang,
            ],

            [
            'label' => 'Berat Barang',
            'attribute' =>'berat',
            'value' => function ($model) {
            if($model)
                return ($model->berat . ' Kg');
            }
            ],
            
            [
            'label' => 'Tarif',
            'format' => 'Currency',
            'attribute'=>'harga',
            ],

            [
            'label' => 'Total',
            'format' => 'Currency',
            'attribute'=>'total',
            ],
            
            [
            'label' => 'Booking Date',
            'attribute' =>'booking_date',
            'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asDate ($model->idCollecting->booking_date, 'dd-MM-Y H:i'). ' WIB';
                }
            ],
        
            // [
            // 'label' => 'Status',
            // 'attribute'=>'p_status',
            // ],

        ],
    ]) ?>
</div>

<div class="col-lg-12">
   <b><p align="left"> <center><font size="4">Data Tracking</font></center></p></b>
<style type="text/css">
    .WarnaHeader table thead {
    background-color: #ffff66;
}
</style>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'options' => ['class' => 'WarnaHeader'],
        'columns' => [

            [
            'label' => 'Tanggal',
            'value' => function ($model) {
                if($model)
                return Yii::$app->formatter->asDate ($model->tanggal, 'l, dd-MM-Y H:i').' WIB';
                }
        
            ],

            [
            'label' => 'Status',
            'value'=>'status',
            ],

            [
            'label' => 'Lokasi',
            'value'=>'id_office',
            // 'value'=>'idMaKantor.kantor_nama',
            ],
        ],
    ]); 
?>
</div>

<div class="col-lg-12">
        <!-- <script src="js/jquery.js"></script> -->
        <script src="timeline/js/timeline.min.js"></script>
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
        <link rel="stylesheet" href="timeline/css/timeline.min.css" />


            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="timeline">
                        <div class="timeline__wrap">
                            <div class="timeline__items">
                            <?php
                            foreach($posts as $row)
                            {
                            ?>
                                <div class="timeline__item">
                                    <div class="timeline__content">
                                        <h2><?php echo $row['status']; ?></h2>
                                        <p><?php echo $row['tanggal']; ?></p>
                                        <strong><p><font color="orange"> <?php echo $row['id_office']; ?></font></p></strong>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<script>
$(document).ready(function(){
    jQuery('.timeline').timeline();
});
</script>



</div>
<hr>
</div>
