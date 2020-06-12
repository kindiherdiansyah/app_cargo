<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProcessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Track';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collecting-index">

       <!--  <h1><FONT COLOR="#000000"><?= Html::encode($this->title) ?></FONT></h1> -->
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
