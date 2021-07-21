<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Takeaway */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="takeaway-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>
    <p>Sugestão: Abra a pagina clientes numa tab para verificar os disponiveis</p>
    <?= $form->field($model, 'id_prato')->textInput() ?>
    <p>Sugestão: Abra a pagina pratos numa tab para verificar os disponiveis</p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
