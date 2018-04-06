<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Seccion;
use app\models\CompetenciaGenerica;
use yii\helpers\ArrayHelper;
use app\models\CompetenciaFormacion;


$competencias=CompetenciaGenerica::find()->all();


/* @var $this yii\web\View */
/* @var $model app\models\FormacionIntegral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formacion-integral-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/formacion-integral/update?id='.$model->for_codigo]); ?>

    <?= $form->field($model, 'for_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for_carreras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for_codigo_asignatura')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'sec_codigo')->hiddenInput()->label(false) ?>-->
	
	<?php $dataCategory=ArrayHelper::map(Seccion::find()->All(), 'sec_codigo', 'sec_nombre'); ?>
	<?= $form->field($model, 'sec_codigo')->dropDownList($dataCategory, 
             ['prompt'=>'-Seleccione un tipo-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	?>
	
	<?php 
	$codigoCompAnt=[];
	$competenciaFormacionAnt=CompetenciaFormacion::find()->where('for_codigo='.$model->for_codigo)->all();
		for($i=0;$i<sizeof($competenciaFormacionAnt);$i++){
				$codigoCompAnt[]= $competenciaFormacionAnt[$i]->cg_codigo;
			}
		//print_r($codigoCompAnt);
	$dataCategoryCG=ArrayHelper::map($competencias, 'cg_codigo', 'cg_nombre'); ?>
	
	<?php
	foreach($competencias as $c=>$competencia){
		if(in_array($competencia->cg_codigo, $codigoCompAnt)){
			echo Html::checkbox('competencias[]', $competencia->cg_codigo,['value'=>$competencia->cg_codigo]);
		}else{
			echo Html::checkbox('competencias[]', '',['value'=>$competencia->cg_codigo]);
		}
		 echo $competencia->cg_nombre.'</br>';
	}
	
	?>
	
	
	<!--<?= Html::checkboxList('competencias', '',$dataCategoryCG,
		['name'=>'competencias','separator' => '<br/>',
			'item' => function($index, $label, $name, $checked, $value) {
			 
			$return = '<label >';
			$return .= '<input   type="checkbox" name="' . $name . '" value="' . $value . '">';                                   
			$return .= '<span class="lbl" >' . ucwords($label) . '</span>';
			$return .= '</label>';
			return $return;
			}
		
		]); 
	?>-->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
