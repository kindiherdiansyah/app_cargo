<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RefBookingSvc */

$this->title = 'Create Data Service';
$this->params['breadcrumbs'][] = ['label' => 'Data Service', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-booking-svc-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
