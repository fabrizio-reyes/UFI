<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Archivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'arc_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arc_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arc_extension')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tip_codigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
