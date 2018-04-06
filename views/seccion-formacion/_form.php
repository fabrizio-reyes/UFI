<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SeccionFormacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seccion-formacion-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'sec_for_numero')->textInput() ?>

    <?= $form->field($model, 'sec_for_horario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_for_docente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_for_lugar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for_codigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
