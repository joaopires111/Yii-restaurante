<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Takeaway */

$this->title = 'Update Takeaway: ' . $model->id_takeaway;
$this->params['breadcrumbs'][] = ['label' => 'Takeaways', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_takeaway, 'url' => ['view', 'id' => $model->id_takeaway]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="takeaway-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
