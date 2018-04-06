<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Perfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true])?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>

