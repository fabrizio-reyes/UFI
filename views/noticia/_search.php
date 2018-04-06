<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoticiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noticia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'not_codigo') ?>

    <?= $form->field($model, 'not_titulo') ?>

    <?= $form->field($model, 'not_subtitulo') ?>

    <?= $form->field($model, 'not_descripcion') ?>

    <?= $form->field($model, 'not_enlace') ?>

    <?php // echo $form->field($model, 'sec_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
