<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_pessoas')->textInput() ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>
    <p>Sugestão: Abra a pagina clientes numa tab para verificar os disponiveis</p>
    <?= $form->field($model, 'id_mesa')->textInput() ?>
    <p>Sugestão: Abra a pagina mesas numa tab para verificar os disponiveis</p>
    <?= $form->field($model, 'hora')->textInput() ?>
    <p>Formato: AAAA-MM-DD</p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
