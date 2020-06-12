<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kantor */

$this->title = 'Update Data Kantor: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Kantor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->location_id, 'url' => ['view', 'id' => $model->location_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kantor-update">

   <!--  <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
