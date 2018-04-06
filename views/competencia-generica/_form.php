<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaGenerica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competencia-generica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cg_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cg_descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
