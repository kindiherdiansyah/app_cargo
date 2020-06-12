<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KantorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kantor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kantor-index panel panel-info">

    <div class="panel-heading">
        <h4><b><?= Html::encode($this->title) ?></b>
        <span class="pull-right">
            <?= Html::a('Create Data Kantor', ['create'], ['class' => 'btn btn-primary btn w3-btn w3-hover-aqua']) ?>
        </span>
        </h4>
    </div>

    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'location_id',
            'nama',
            'telp',
            'address',
            [
            'label' => 'Maps',
            'format' => 'url',
            'value' => function ($model) {
            if($model)
                return ('https://maps.google.com/?q='.$model->lat.','.$model->lng);
                }
            ],

            // 'map',
            // 'lat',
            // 'lng',

            ['class' => 'kartik\grid\ActionColumn',
            'header'=>"Actions"],
        ],
    ]); ?>
    </div>
</div>
