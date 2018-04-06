<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Taller */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taller-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tal_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tal_sede')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tal_fecha')->textInput() ?>

    <?= $form->field($model, 'tal_docente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tal_objetivos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lin_codigo')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
