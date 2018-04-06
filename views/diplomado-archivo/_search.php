<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiplomadoArchivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diplomado-archivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dip_arc_codigo') ?>

    <?= $form->field($model, 'dip_codigo') ?>

    <?= $form->field($model, 'arc_codigo') ?>

    <?= $form->field($model, 'tip_arc_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
