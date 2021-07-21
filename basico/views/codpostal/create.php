<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Codpostal */

$this->title = 'Create Codpostal';
$this->params['breadcrumbs'][] = ['label' => 'Codpostals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codpostal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
