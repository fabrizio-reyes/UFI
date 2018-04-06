<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaGenerica */

$this->title = 'Update Competencia Generica: ' . $model->cg_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Competencia Genericas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cg_codigo, 'url' => ['view', 'id' => $model->cg_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="competencia-generica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
