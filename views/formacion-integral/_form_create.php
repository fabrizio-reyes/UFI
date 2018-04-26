<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Seccion;
use app\models\CompetenciaGenerica;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;

$competencias=CompetenciaGenerica::find()->all();
$dataCategory=ArrayHelper::map(Seccion::find()->All(), 'sec_codigo', 'sec_nombre');
$dataCategory2=ArrayHelper::map($competencias, 'cg_codigo', 'cg_nombre');

/* @var $this yii\web\View */
/* @var $model app\models\FormacionIntegral */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper_seccion").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper_seccion .panel-title-seccion").each(function(index) {
        jQuery(this).html("Sección: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper_seccion").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper_seccion .panel-title-seccion").each(function(index) {
        jQuery(this).html("Sección: " + (index + 1))
    });
});
';

$this->registerJs($js);

?>

<div class="formacion-integral-form">

    <?php $form = ActiveForm::begin(["id" => 'dynamic-form',"action"=>$_SERVER['SCRIPT_NAME'].'/formacion-integral/create']); ?>

    <?= $form->field($model, 'for_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for_carreras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'for_codigo_asignatura')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'sec_codigo')->textInput() ?>-->
	
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
	
	<?= Html::checkboxList('competencias', '',$dataCategory2,
		['name'=>'competencias','separator' => '<br/>'
		
		]); 
	?>
	
	<?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper_seccion', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items_seccion', // required: css class selector
        'widgetItem' => '.item_seccion', // required: css class
        'limit' => 50, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item_seccion', // css class
        'deleteButton' => '.remove-item_seccion', // css class
        'model' => $seccionesformacion[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'sec_for_codigo',
            'sec_for_numero',
            'sec_for_horario',
            'sec_for_docente',
            'sec_for_lugar',
        ],
    ]); ?>
	<div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-plus"></i> Secciones
            <button type="button" class="pull-right add-item_seccion btn btn-success btn-xs"><i class="fa fa-plus"></i> Nuevo</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items_seccion"><!-- widgetContainer -->
            <?php foreach ($seccionesformacion as $index => $modelAddress): ?>
                <div class="item_seccion panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-seccion">Sección: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item_seccion btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$index}]sec_for_codigo");
                            }
                        ?>
						
						<?= $form->field($modelAddress, "[{$index}]sec_for_numero")->textInput(['maxlength' => true]) ?>
						
                        <?= $form->field($modelAddress, "[{$index}]sec_for_horario")->textInput(['maxlength' => true]) ?>
                        				
      
                                <?= $form->field($modelAddress, "[{$index}]sec_for_docente")->textInput(['maxlength' => true]) ?>                           
                            
                                <?= $form->field($modelAddress, "[{$index}]sec_for_lugar")->textInput(['maxlength' => true]) ?>           
                            
                               

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
