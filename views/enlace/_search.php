<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enlace-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'enl_codigo') ?>

    <?= $form->field($model, 'enl_nombre') ?>

    <?= $form->field($model, 'enl_direccion') ?>

    <?= $form->field($model, 'sec_codigo') ?>

    <?= $form->field($model, 'arc_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
