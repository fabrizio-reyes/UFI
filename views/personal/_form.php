<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Seccion;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/personal/update/'.$model->pers_codigo]); ?>

    <?= $form->field($model, 'pers_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pers_cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pers_correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pers_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_codigo')->hiddenInput()->label(false) ?>

    <!-- <?= $form->field($model, 'sec_codigo')->hiddenInput()->label(false) ?>-->
    
    <?php $dataCategory=ArrayHelper::map(Seccion::find()->All(), 'sec_codigo', 'sec_nombre'); ?>
	<?= $form->field($model, 'sec_codigo')->dropDownList($dataCategory, 
             ['prompt'=>'-Seleccione un tipo-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
