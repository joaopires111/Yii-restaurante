<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CodpostalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Codpostals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codpostal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Codpostal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codpostal',
            'localidade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
