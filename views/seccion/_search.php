<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SeccionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seccion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sec_codigo') ?>

    <?= $form->field($model, 'sec_nombre') ?>

    <?= $form->field($model, 'sec_titulo') ?>

    <?= $form->field($model, 'sec_descripcion') ?>

    <?= $form->field($model, 'sec_orden') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
