<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LineaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linea-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lin_codigo') ?>

    <?= $form->field($model, 'lin_nombre') ?>

    <?= $form->field($model, 'lin_descripcion') ?>

    <?= $form->field($model, 'est_lin_codigo') ?>
    
     <?= $form->field($model, 'cg_codigo') ?>

    <?= $form->field($model, 'sec_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
