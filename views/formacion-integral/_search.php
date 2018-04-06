<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormacionIntegralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formacion-integral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'for_codigo') ?>

    <?= $form->field($model, 'for_nombre') ?>

    <?= $form->field($model, 'for_descripcion') ?>

    <?= $form->field($model, 'for_carreras') ?>

    <?= $form->field($model, 'for_codigo_asignatura') ?>

    <?php // echo $form->field($model, 'sec_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
