<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarif';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="tarif-cargo-index">

   <!--  <h1><FONT COLOR="#000000"><?= Html::encode($this->title) ?></h1> -->
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'service_id',
        [
        'label' => 'Pengiriman Via',
        'attribute' =>'shipment_id',
        'format'=> 'raw', 
        'value' => function ($model){
            if($model->shipment_id=='JP01')
                {
                return '<i class="fas fa-truck" style="font-size:25px;color:orangered">Darat</i>';
            } else if($model->shipment_id=='JP02')
                {
                return '<i class="fa fa-plane" style="font-size:25px;color:navy">Garuda Indonesia</i>';
            } else if($model->shipment_id=='JP03')
                {
                return '<i class= "fas fa-ship" style="font-size:25px;color:blue">Laut</i>';
            } else if($model->shipment_id=='JP04')
                {
                return '<i class= "fas fa-plane" style="font-size:25px;color:green">Citilink</i>';
            } 
            else 
            {
                return '<i class="fa fa-plane" style="font-size:25px;color:peru">Sriwijaya Air</i>';
            }
        }
        ],
 
            [
        'label' => 'Servis',
        'attribute' =>'service_id',
        ],
            
            [
        'label' => 'Daerah Asal',
        'attribute' =>'origin_name',
        ],

            [
        'label' => 'Daerah Tujuan',
        'attribute' =>'destination_name',
        ],
           
            [
        'label' => 'Biaya Admin',
        'attribute' =>'admin_fee',
        'format' => 'currency',
        'value' => function ($model) {
            if($model->admin_fee === null)
                return null;
            else
                return $model->admin_fee;
            }
        ],

     
        // [
        // 'label' => 'Tarif',
        // 'attribute' =>'rate',
        // 'format' => 'Currency',
        // ],

        // [
        // 'label' => 'Tarif',
        // 'attribute' =>'rate',
        // 'value' => function ($model) {
        //     if($model)
        //         return Yii::$app->formatter->asCurrency ($model->rate + $model->admin_fee);
        //     }
        // ],

        // [
        // 'label' => 'Tarif',
        // 'attribute' =>'rate',
        // 'contentOptions' => ['class' => 'col-lg-1'],

        // 'format'=>['decimal',0],
        
        // ],

        [
        'label' => 'Estimasi',
        'attribute' =>'lead_time',
        'value' => function ($model) {
            if($model)
                return ($model->lead_time . ' Hari');
            }
        ],

        // [
        // 'label' => 'Tarif',
        // 'format' => 'Currency',
        // 'value' => function($data) {
        // $jumlah= $data['rate'] * Yii::$app->request->get('TarifCargoSearch')['massa'];
        // return $jumlah;
        //     }
        // ],

        // [
        // 'label' => 'Tarif',
        // 'format' => 'Currency',
        // 'value' => function ($model) {
        // // Please note that the $model will be object not an array
        //     $massa = Yii::$app->request->get('TarifCargoSearch')['massa'];
        //     $kg_min = 100;
        //     $volume = $model->rate * Yii::$app->request->get('TarifCargoSearch')['panjang'] * Yii::$app->request->get('TarifCargoSearch')['lebar'] * Yii::$app->request->get('TarifCargoSearch')['tinggi'] /4000 + $model->admin_fee; 
        //     $mass = $model->rate * $massa + $model->admin_fee;
        //     if ($massa <= $kg_min) 
        //         return $kg_min * $model->rate + $model->admin_fee;
        //     else 
        //         return $mass;
        
        // }
        // ],

// $kg_min = 100;
// $kg_cargo = x;
// $hrg_per_kg = 1000;

// if($kg_cargo < $kg_min){ 
//     $hrg_total = $kg_min * $hrg_per_kg}
// else{$hrg_total = $kg_cargo * $hrg_per_kg} 
        [
        'label' => 'Tarif Massa',
        'format' => 'Currency',
        'value' => function ($model) {
        
            $kg_udara_min = 10;
            $kg_darat_min = 100;
            $massa = Yii::$app->request->get('TarifCargoSearch')['massa'];
            $total = $model->rate * $massa + $model->admin_fee;
            $min_udara = $model->rate * $kg_udara_min + $model->admin_fee;
            $min_darat = $model->rate * $kg_darat_min + $model->admin_fee;
            


            if (($model->shipment_id == 'JP01') && ($massa <= $kg_darat_min)) {
                return $min_darat;
            } else if (($model->shipment_id == 'JP03') && ($massa <= $kg_darat_min)) {
                return $min_darat;
            } else if (($model->shipment_id == 'JP02') && ($massa <= $kg_udara_min)) {
                return $min_udara;
            } else if (($model->shipment_id == 'JP04') && ($massa <= $kg_udara_min)) {
                return $min_udara;
            } else if (($model->shipment_id == 'JP05') && ($massa <= $kg_udara_min)) {
                return $min_udara;
            
            // } else if (($model->service_id == 'P2PU') && ($massa <= $kg_udara_min)) {
            //     return $min_udara;
            // } else if (($model->service_id == 'SMU') && ($min_darat >= $min_udara)) {
            //     return $total;
            } else if (($model->shipment_id == 'JP02') && ($min_darat >= $min_udara)) {
                return $total;
            } else if (($model->shipment_id == 'JP04') && ($min_darat >= $min_udara)) {
                return $total;
            } else if (($model->shipment_id == 'JP05') && ($min_darat >= $min_udara)) {
                return $total;
            // } else if (($model->shipment_id == 'JP03') && ($min_darat >= $min_udara)) {
            //     return $total;
            // } else if (($model->service_id == 'P2PU') && ($min_darat >= $min_udara)) {
            //     return $total;
            } 
            else 
            {
                return max([$min_darat, $total]);
            }
        
            return max([$total]);
            
            }
        ],

        [
        'label' => 'Tarif Volume',
        'format' => 'Currency',
        'value' => function ($model) {
            $kg_udara_min = 10;
            $kg_darat_min = 100;
            $rate = $model->rate;
            $volume = Yii::$app->request->get('TarifCargoSearch')['panjang'] * Yii::$app->request->get('TarifCargoSearch')['lebar'] * Yii::$app->request->get('TarifCargoSearch')['tinggi'];
            $vol_darat = $volume / 4000;
            $vol_udara = $volume /6000;
            $totaldarat = $rate * $volume / 4000 + $model->admin_fee;
            $totaludara = $rate * $volume / 6000 + $model->admin_fee;
            $min_darat = $rate * $kg_darat_min + $model->admin_fee;
            $min_udara = $rate * $kg_udara_min + $model->admin_fee;

             if (($model->shipment_id == 'JP01') && ($vol_darat <= $kg_darat_min)) {
                return $min_darat;
            } else if (($model->shipment_id == 'JP03') && ($vol_darat <= $kg_darat_min)) {
                return $min_darat;
            } else if (($model->shipment_id == 'JP02') && ($vol_udara <= $kg_udara_min)) {
                return $min_udara;
            } else if (($model->shipment_id == 'JP04') && ($vol_udara <= $kg_udara_min)) {
                return $min_udara;
            } else if (($model->shipment_id == 'JP05') && ($vol_udara <= $kg_udara_min)) {
                return $min_udara;
            // } else if (($model->service_id == 'P2PU') && ($vol_udara <= $kg_udara_min)) {
            //     return $min_udara;
            } else if (($model->shipment_id == 'JP01') && ($vol_darat >= $kg_darat_min)) {
                return $totaldarat;
            } else if (($model->shipment_id == 'JP03') && ($vol_darat >= $kg_darat_min)) {
                return $totaldarat;
            } else if (($model->shipment_id == 'JP02') && ($vol_udara >= $kg_udara_min)) {
                return $totaludara;
            } else if (($model->shipment_id == 'JP04') && ($vol_udara >= $kg_udara_min)) {
                return $totaludara;
            } else if (($model->shipment_id == 'JP05') && ($vol_udara >= $kg_udara_min)) {
                return $totaludara;
            // } else if (($model->service_id == 'P2PU') && ($vol_udara >= $kg_udara_min)) {
            //     return $totaludara;
            } 
            else 
            {
                return max([$min_darat, $totaldarat]);
            }

            }
        ],

        [
        'label' => 'Tarif Kubikasi',
        'format' => 'Currency',
        'value' => function ($model) {
            
        $kub_min = 3;
        $minn = $model->rate_cube * $kub_min + $model->admin_fee;
        $kubikasi = $model->rate_cube * Yii::$app->request->get('TarifCargoSearch')['panjang'] * Yii::$app->request->get('TarifCargoSearch')['lebar'] * Yii::$app->request->get('TarifCargoSearch')['tinggi'] / 1000000 + $model->admin_fee;
        $kubik = $model->rate_cube * Yii::$app->request->get('TarifCargoSearch')['panjang'] * Yii::$app->request->get('TarifCargoSearch')['lebar'] * Yii::$app->request->get('TarifCargoSearch')['tinggi'] / 1000000;
        $min = $model->rate_cube * $kub_min;
        $kumin = max($kubikasi, $minn);
            
        if($model->rate_cube === null)
            return null;
        else
            return ($kumin);
            }        
        ],

//         [
//     'label' => 'Tarif',
//     'format' => 'Currency',
//     'value' => function ($model) {

//         $panjang = Yii::$app->request->get('TarifCargoSearch')['panjang'];
//         $lebar = Yii::$app->request->get('TarifCargoSearch')['lebar'];
//         $tinggi = Yii::$app->request->get('TarifCargoSearch')['tinggi'];
//         $volumedarat = ($panjang * $lebar * $tinggi) / 4000;
//         $volumeudara = ($panjang * $lebar * $tinggi) / 6000;
//         $rate = $model->rate;
//         $rate_darat = ($rate * $volumedarat) + $model->admin_fee;
//         $rate_udara = ($rate * $volumeudara) + $model->admin_fee;
//         $mass = Yii::$app->request->get('TarifCargoSearch')['massa'];
//         $mass_min = 100;

//         if ($mass_min >= $mass) 
//         {
//            return $rate * $mass_min;
//         } 
//         else 
//         {
//            return $rate * $mass;
//         }
//         return max([$total, $volume]);
//      }
// ],
        // [
        // 'label' => 'Tarif',
        // 'format' => 'Currency',
        // 'value' => function ($model) {
        //     $volume = $model['rate'] * Yii::$app->request->get('TarifCargoSearch')['panjang'] * Yii::$app->request->get('TarifCargoSearch')['lebar'] * Yii::$app->request->get('TarifCargoSearch')['tinggi'] / 4000;
        //     $mass = $model['rate'] * Yii::$app->request->get('TarifCargoSearch')['massa']; 
        // if ($volume > $mass) {
        //     return $volume;
        // } else if ($volume < $mass) {
        //     return $mass;
        // }
        // // } else {
        // //     throw new Exception('Dunno what to do in this case');
        // // }
        //     }
        // ],


        //     [
        //     'label' => 'Total Tarif (Rp)',
        //     'attribute' => 'total',
        //     'pageSummary' => true,
        //     'pageSummaryOptions' => ['tcargo_id' => 'rate'],
        //     'value' => function($model, $url) {
        //     if($model)
        //     return ($model->rate * $massa);
        //     }
        // ],
            


        
            //'alamat_pemesan',
            //'email_pemasan:email',

           
 



            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'template' => '{view}',
            // ],
        ],
    ]); ?>
    
     
</div>


