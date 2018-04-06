<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPerfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-perfil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'est_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
