<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaFormacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competencia-formacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cg_codigo')->textInput() ?>

    <?= $form->field($model, 'for_codigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
