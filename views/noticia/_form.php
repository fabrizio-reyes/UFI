<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Seccion;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model app\models\Noticia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noticia-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/noticia/update/'.$model->not_codigo]); ?>

    <?= $form->field($model, 'not_titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'not_subtitulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'not_descripcion')->widget(TinyMce::className(), [
		'options' => ['rows' => 6, 'id'=>'not_descripcion'.$model->sec_codigo],
		'language' => 'es',
		'clientOptions' => [
		'plugins' => [
			"advlist autolink lists link charmap print preview anchor textcolor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		'toolbar' => "formatselect | bold italic  strikethrough  forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat"
		]
		]);?>

    <?= $form->field($model, 'not_enlace')->textInput(['maxlength' => true]) ?>

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
