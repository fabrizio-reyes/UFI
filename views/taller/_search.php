<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TallerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taller-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tal_codigo') ?>

    <?= $form->field($model, 'tal_nombre') ?>

    <?= $form->field($model, 'tal_sede') ?>

    <?= $form->field($model, 'tal_fecha') ?>

    <?= $form->field($model, 'tal_docente') ?>

    <?php // echo $form->field($model, 'tal_objetivos') ?>

    <?php // echo $form->field($model, 'lin_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
