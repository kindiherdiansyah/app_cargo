<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TarifCargo */

$this->title = 'Create Data Tarif';
$this->params['breadcrumbs'][] = ['label' => 'Data Tarif', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-cargo-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
