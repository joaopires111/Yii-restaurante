<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BackenduserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backendusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backenduser-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Backenduser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstname',
            'lastname',
            'username',
            'password',
             'cargo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
