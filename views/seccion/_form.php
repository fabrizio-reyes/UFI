<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\sortinput\SortableInput;
use app\models\Seccion;
$secciones=Seccion::find()->orderby("sec_orden")->all();

/* @var $this yii\web\View */
/* @var $model app\models\Seccion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//echo $_SERVER['SCRIPT_NAME']; // /ufi/web/index.php
?>
<div class="seccion-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/seccion/update/'.$model->sec_codigo]); ?>

    <?= $form->field($model, 'sec_nombre')->textInput(['maxlength' => true]) ?>
	
	
    <!--<?= $form->field($model, 'sec_titulo')->textInput(['maxlength' => true]) ?>-->

	<?= $form->field($model, 'sec_titulo')->widget(TinyMce::className(), [
		'options' => ['rows' => 6, 'id'=>'sec_titulo'.$model->sec_codigo],
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
		
    <?= $form->field($model, 'sec_descripcion')->widget(TinyMce::className(), [
		'options' => ['rows' => 6, 'id'=>'sec_descripcion'.$model->sec_codigo],
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
    <?= $form->field($model, 'sec_orden')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php  ActiveForm::end(); ?>

</div>
