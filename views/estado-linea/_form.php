<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoLinea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-linea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'est_lin_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
