<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar fixed-top navbar-dark navbar-expand',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //sem login
            ['label' => 'Inicio', 'url' => ['/site/index'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'Pratos', 'url' => ['/prato2/index'], 'visible' => Yii::$app->user->isGuest],            
            //admin
            ['label' => 'Utilizadores', 'url' => ['/backenduser'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],
            ['label' => 'Clientes', 'url' => ['/cliente'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],
            ['label' => 'Funcionarios', 'url' => ['/funcionario'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],
            ['label' => 'Fornecedores', 'url' => ['/fornecedor'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],
            ['label' => 'Codigo Postal', 'url' => ['/codpostal'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],    
            ['label' => 'Reservas de Mesa', 'url' => ['/reserva'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],            
            ['label' => 'Mesas', 'url' => ['/mesa'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],
            ['label' => 'Pedidos Takeaway', 'url' => ['/takeaway'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],
            ['label' => 'Pratos', 'url' => ['/prato'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],
            ['label' => 'Stock', 'url' => ['/stock'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="gerente" ],
            //cozinheiro
            ['label' => 'Pratos', 'url' => ['/prato'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="cozinheiro" ],
            ['label' => 'Stock', 'url' => ['/stock'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="cozinheiro" ],
            //funcionario           
            ['label' => 'Reservas de Mesa', 'url' => ['/reserva'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="funcionario" ],            
            ['label' => 'Mesas', 'url' => ['/mesa'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="funcionario" ],
            ['label' => 'Pedidos Takeaway', 'url' => ['/takeaway'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="funcionario" ],
            ['label' => 'Pratos', 'url' => ['/prato'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="funcionario" ],
            ['label' => 'Stock', 'url' => ['/stock'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->cargo=="funcionario" ],
    
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'                
            )


        ],
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
        <p class="pull-left">&copy; João Pires 23804 <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
