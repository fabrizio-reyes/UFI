<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Seccion;
use app\models\CompetenciaGenerica;
use yii\helpers\ArrayHelper;
use app\models\EstadoLinea;

$dataCategory=ArrayHelper::map(Seccion::find()->All(), 'sec_codigo', 'sec_nombre');
$dataCategory2=ArrayHelper::map(EstadoLinea::find()->All(), 'est_lin_codigo', 'est_lin_nombre');
$dataCategory3=ArrayHelper::map(CompetenciaGenerica::find()->All(), 'cg_codigo', 'cg_nombre');

/* @var $this yii\web\View */
/* @var $model app\models\Linea */
/* @var $form yii\widgets\ActiveForm */
$js = '
jQuery(".dynamicform_wrapper_linea").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper_linea .panel-title-taller").each(function(index) {
        jQuery(this).html("Taller: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper_linea").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper_linea .panel-title-taller").each(function(index) {
        jQuery(this).html("Taller: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="linea-form">

    <?php $form = ActiveForm::begin(["id" => 'dynamic-form2',"action"=>$_SERVER['SCRIPT_NAME'].'/linea/create']); ?>

    <?= $form->field($model, 'lin_nombre')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'lin_descripcion')->textInput(['maxlength' => true]) ?>
	
	<!--<?= $form->field($model, 'est_lin_codigo')->textInput(['maxlength' => true]) ?>-->
	
	<?= $form->field($model, 'est_lin_codigo')->dropDownList($dataCategory2, 
             ['prompt'=>'-Seleccione un tipo-',
			 //'options' => ['style' => 'color: #000; font-size: 18px;'],
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	?>
	 
	 <!-- <?= $form->field($model, 'cg_codigo')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'sec_codigo')->hiddenInput()->label(false) ?>-->
   
        
	
	
	<?= $form->field($model, 'cg_codigo')->dropDownList($dataCategory3, 
             ['prompt'=>'-Seleccione un tipo-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('post/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']); 
	?>
	
	<?php $dataCategory=ArrayHelper::map(Seccion::find()->All(), 'sec_codigo', 'sec_nombre'); ?>
		<?= $form->field($model, 'sec_codigo')->radioList($dataCategory,
              [
                'item' => function($index, $label, $name, $checked, $value) {
					$return = '<label class="col-sm-12">';
                    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                    $return .= '<i></i>';
                    $return .= '<span>' . ucwords($label) . '</span>';
                    $return .= '</label><br/>';
					return $return;
                }
               ]
         );
    ?>
	
	<?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper_linea', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items_linea', // required: css class selector
        'widgetItem' => '.item_linea', // required: css class
        'limit' => 10, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item_linea', // css class
        'deleteButton' => '.remove-item_linea', // css class
        'model' => $talleres[0],
        'formId' => 'dynamic-form2',
        'formFields' => [
            'tal_codigo',
            'tal_nombre',
            'tal_sede',
            'tal_fecha',
            'tal_docente',
            'tal_objetivos',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-plus"></i> Talleres
            <button type="button" class="pull-right add-item_linea btn btn-success btn-xs"><i class="fa fa-plus"></i> Nuevo</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items_linea"><!-- widgetContainer -->
            <?php foreach ($talleres as $index => $modelAddress): ?>
                <div class="item_linea panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-taller">Taller: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item_linea btn_linea btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$index}]tal_codigo");
                            }
                        ?>
                        <?= $form->field($modelAddress, "[{$index}]tal_nombre")->textInput(['maxlength' => true]) ?>
      
                                <?= $form->field($modelAddress, "[{$index}]tal_sede")->textInput(['maxlength' => true]) ?>                           
                            
                                <?= $form->field($modelAddress, "[{$index}]tal_fecha")->textInput(['maxlength' => true]) ?>           
                            
                                <?= $form->field($modelAddress, "[{$index}]tal_docente")->textInput(['maxlength' => true]) ?>
                           
                                <?= $form->field($modelAddress, "[{$index}]tal_objetivos")->textInput(['maxlength' => true]) ?>
                                
								<!--<?= $form->field($modelAddress, "[{$index}]lin_codigo")->textInput(['maxlength' => true]) ?>-->
                            
							
                        

                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?> 
	
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
