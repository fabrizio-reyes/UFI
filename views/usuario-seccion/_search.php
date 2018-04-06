<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSeccionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-seccion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usu_sec_codigo') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sec_codigo') ?>

    <?= $form->field($model, 'usu_sec_fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
