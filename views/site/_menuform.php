<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\Seccion;

$seccione=Seccion::find()->orderby("sec_orden")->all();
/* @var $this yii\web\View */
/* @var $model app\models\Seccion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
//echo $_SERVER['SCRIPT_NAME']; // /ufi/web/index.php
?>
<div class="seccion-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/site/menuform']); ?>

	<?php 
	foreach($seccione as $s=>$seccion){
		 echo $form->field($seccion, 'sec_nombre')->textInput(['maxlength' => true]);
	}
	?>
   

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
