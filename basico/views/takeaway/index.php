<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TakeawaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Takeaways';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takeaway-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Takeaway', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_takeaway',
            'valor',
            'id_cliente',
            'id_prato',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
