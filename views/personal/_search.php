<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pers_codigo') ?>

    <?= $form->field($model, 'pers_nombre') ?>

    <?= $form->field($model, 'pers_cargo') ?>

    <?= $form->field($model, 'pers_correo') ?>

    <?= $form->field($model, 'pers_telefono') ?>

    <?php // echo $form->field($model, 'sec_codigo') ?>

    <?php // echo $form->field($model, 'arc_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
