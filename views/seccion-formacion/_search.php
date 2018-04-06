<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SeccionFormacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seccion-formacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sec_for_codigo') ?>
	
	<?= $form->field($model, 'sec_for_numero') ?>

    <?= $form->field($model, 'sec_for_horario') ?>

    <?= $form->field($model, 'sec_for_docente') ?>

    <?= $form->field($model, 'sec_for_lugar') ?>

    <?= $form->field($model, 'for_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
