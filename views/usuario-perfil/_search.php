<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioPerfilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-perfil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usu_per_codigo') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'per_codigo') ?>

    <?= $form->field($model, 'est_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
