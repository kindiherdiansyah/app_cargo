<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Kargo Ritel (Administrator)',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
			'role' => 'navigation',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Masuk', 'url' => ['/site/login']];
    } else {
        $menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],

    [
            'label' => 'Kelola Data Tarif',
            'items' => [
                ['label' => 'Data Shipment', 'url' => ['/shipment/index']],
                ['label' => 'Data Service', 'url' => ['/ref-booking-svc/index']],
                ['label' => 'Data Tariff', 'url' => ['/tarif-cargo/index']],
        ],
    ],

    // ['label' => 'Kelola Data Kantor ', 'url' => ['/kantor/index']],
    // ['label' => 'Data Service', 'url' => ['/ref-booking-svc/index']],
    // ['label' => 'Data Tariff', 'url' => ['/tarif-cargo/index']],
    ['label' => 'Data User', 'url' => ['/user/index']],
	['label' => 'Daftar User', 'url' => ['/site/signup']],
		
    ];
        $menuItems[] = [
            'label' => 'Keluar (' . Yii::$app->user->identity->nama . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];  
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Sistem KDR <?= date('Y') ?></p>

        <p class="pull-right">Dibuat Oleh Kindi Herdiansyah</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
