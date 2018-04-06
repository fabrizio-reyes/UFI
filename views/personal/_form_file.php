<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">

    <?php $form = ActiveForm::begin(['options'=>['multipart/form_data'], "action"=>$_SERVER['SCRIPT_NAME'].'/personal/updatefile/'.$archivo->arc_codigo]); ?>

    

    <?= $form->field($archivo, 'arc_direccion')->hiddenInput(['maxlength' => true])->label(false)  ?>

	
	<?= $form->field($file, 'imageFile')->fileInput(['id' => 'uploadFile'.$archivo->arc_codigo])->label('Imagen principal') ?>
	
		<?php $archivonum=$archivo->arc_codigo; ?>
		<script>   
		document.getElementById('uploadFile<?php echo $archivonum; ?>').onchange=function(){
		  console.log(this.value);
		  var nombre=this.value.substr(this.value.lastIndexOf('\\') + 1).split('.')[0];
		  var ext=this.value.split('.')[1];
		  document.getElementById('not_imagen<?php echo $archivonum; ?>').value=nombre;
		  document.getElementById('not_ext<?php echo $archivonum; ?>').value=ext;
		}
		</script>
		
		<?= $form->field($archivo, 'arc_nombre')->hiddenInput(['id' => 'not_imagen'.$archivo->arc_codigo])->label(false) ?>
		<?= $form->field($archivo, 'arc_extension')->hiddenInput(['id' => 'not_ext'.$archivo->arc_codigo])->label(false) ?>

		
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
