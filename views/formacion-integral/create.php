<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FormacionIntegral */
/*
$this->title = 'Create Formacion Integral';
$this->params['breadcrumbs'][] = ['label' => 'Formacion Integrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="formacion-integral-create">

   <!-- <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form_create', [
        'model' => $model,
		'seccionesformacion' => $seccionesformacion,
    ]) ?>

</div>
