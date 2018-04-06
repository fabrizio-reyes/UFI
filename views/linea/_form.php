<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Seccion;
use app\models\EstadoLinea;
use app\models\CompetenciaGenerica;


$dataCategory=ArrayHelper::map(Seccion::find()->All(), 'sec_codigo', 'sec_nombre');
$dataCategory2=ArrayHelper::map(EstadoLinea::find()->All(), 'est_lin_codigo', 'est_lin_nombre');
$dataCategory3=ArrayHelper::map(CompetenciaGenerica::find()->All(), 'cg_codigo', 'cg_nombre');

/* @var $this yii\web\View */
/* @var $model app\models\Linea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linea-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/linea/update/'.$model->lin_codigo]); ?>

    <?= $form->field($model, 'lin_nombre')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'lin_descripcion')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'est_lin_codigo')->textInput() ?>-->
	
	
	<?= $form->field($model, 'est_lin_codigo')->dropDownList($dataCategory2, 
             ['prompt'=>'-Seleccione un tipo-',
			 'options' => ['style' => 'color: #000; font-size: 18px;'],
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	?>
	 
	 <!--<?= $form->field($model, 'cg_codigo')->textInput(['maxlength' => true]) ?>-->
	 
   <!-- <?= $form->field($model, 'sec_codigo')->hiddenInput()->label(false) ?>-->
   
   <?= $form->field($model, 'cg_codigo')->dropDownList($dataCategory3, 
             ['prompt'=>'-Seleccione un tipo-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	?>
   
        
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
