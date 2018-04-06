<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiplomadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diplomado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dip_codigo') ?>

    <?= $form->field($model, 'dip_nombre') ?>

    <?= $form->field($model, 'dip_descripcion') ?>

    <?= $form->field($model, 'dip_objetivo_general') ?>

    <?= $form->field($model, 'dip_objetivos_especificos') ?>

    <?php // echo $form->field($model, 'dip_orientado') ?>

    <?php // echo $form->field($model, 'dip_horario') ?>

    <?php // echo $form->field($model, 'dip_contacto') ?>

    <?php // echo $form->field($model, 'sec_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
