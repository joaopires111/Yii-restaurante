<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Backenduser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="backenduser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->dropDownList([ 'gerente' => 'Gerente', 'funcionario' => 'Funcionario', 'cozinheiro' => 'Cozinheiro', ], ['prompt' => '']) ?>
    <p>O cargo irá defenir quais funcionalidades o utilizador tem</p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
