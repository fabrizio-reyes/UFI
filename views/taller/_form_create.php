<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Linea;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;

$dataCategory=ArrayHelper::map(Linea::find()->All(), 'lin_codigo', 'lin_nombre');

/* @var $this yii\web\View */
/* @var $model app\models\Taller */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taller-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/taller/create']); ?>

    <?= $form->field($model, 'tal_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tal_sede')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'tal_fecha')->textInput() ?>-->
	 <?php 
	 echo $form->field($model, 'tal_fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Elija fecha de realización del Taller'],
    'readonly' => true,
	'pluginOptions' => [
        'autoclose'=>true,
		'format' => 'dd/MM/yyyy'
    ]
]);
	 
	 ?>

    <?= $form->field($model, 'tal_docente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tal_objetivos')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'lin_codigo')->textInput(['maxlength' => true]) ?>-->
	
	<?= $form->field($model, 'lin_codigo')->dropDownList($dataCategory, 
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
