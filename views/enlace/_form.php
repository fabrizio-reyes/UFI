<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Enlace */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enlace-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enl_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enl_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_codigo')->textInput() ?>

    <?= $form->field($model, 'arc_codigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
