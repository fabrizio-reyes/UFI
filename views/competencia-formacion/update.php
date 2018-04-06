<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaFormacion */

$this->title = 'Update Competencia Formacion: ' . $model->com_for_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Competencia Formacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->com_for_codigo, 'url' => ['view', 'id' => $model->com_for_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="competencia-formacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
