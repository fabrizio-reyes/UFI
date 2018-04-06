<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Seccion;

/* @var $this yii\web\View */
/* @var $model app\models\DatosUfi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datos-ufi-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/datos-ufi/update?id='.$model->dat_codigo]); ?>

    <?= $form->field($model, 'dat_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat_titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_codigo')->hiddenInput()->label(false) ?>
	
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
