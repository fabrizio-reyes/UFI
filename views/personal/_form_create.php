<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Seccion;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">

    <?php $form = ActiveForm::begin(["action"=>$_SERVER['SCRIPT_NAME'].'/personal/create']); ?>

    <?= $form->field($model, 'pers_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pers_cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pers_correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pers_telefono')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'sec_codigo')->textInput(['maxlength' => true]) ?>-->
    
    <?php $dataCategory=ArrayHelper::map(Seccion::find()->All(), 'sec_codigo', 'sec_nombre'); ?>
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

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
