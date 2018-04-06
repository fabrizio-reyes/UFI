<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoLinea */

$this->title = 'Update Estado Linea: ' . $model->est_lin_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Estado Lineas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->est_lin_codigo, 'url' => ['view', 'id' => $model->est_lin_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-linea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
