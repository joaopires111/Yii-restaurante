<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PratoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_prato') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'precocusto') ?>

    <?= $form->field($model, 'precovenda') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?php // echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
