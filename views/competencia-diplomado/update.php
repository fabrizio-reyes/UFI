<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaDiplomado */

$this->title = 'Update Competencia Diplomado: ' . $model->com_dip_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Competencia Diplomados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->com_dip_codigo, 'url' => ['view', 'id' => $model->com_dip_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="competencia-diplomado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
