<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prato */

$this->title = 'Update Prato: ' . $model->id_prato;
$this->params['breadcrumbs'][] = ['label' => 'Pratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_prato, 'url' => ['view', 'id' => $model->id_prato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
