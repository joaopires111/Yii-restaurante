<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Takeaway */

$this->title = 'Create Takeaway';
$this->params['breadcrumbs'][] = ['label' => 'Takeaways', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takeaway-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
