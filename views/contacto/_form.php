<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contacto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacto-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/contacto/create']); ?>

    <?= $form->field($model, 'con_nombre')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese su Nombre']) ?>

    <?= $form->field($model, 'con_correo')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese su Correo']) ?>

    <?= $form->field($model, 'con_mensaje')->textArea(['maxlength' => true, 'placeholder'=>'Escriba su mensaje','rows'=>'10']) ?>



    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
