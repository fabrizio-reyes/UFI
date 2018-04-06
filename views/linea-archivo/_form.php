<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LineaArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linea-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lin_codigo')->textInput() ?>

    <?= $form->field($model, 'arc_codigo')->textInput() ?>

    <?= $form->field($model, 'tip_arc_codigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
