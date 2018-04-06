<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatosUfiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datos-ufi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dat_codigo') ?>

    <?= $form->field($model, 'dat_nombre') ?>

    <?= $form->field($model, 'dat_titulo') ?>

    <?= $form->field($model, 'dat_descripcion') ?>

    <?= $form->field($model, 'sec_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
