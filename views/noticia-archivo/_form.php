<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoticiaArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noticia-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'not_codigo')->textInput() ?>

    <?= $form->field($model, 'arc_codigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
