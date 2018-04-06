<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiplomadoArchivo */

$this->title = 'Update Diplomado Archivo: ' . $model->dip_arc_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Diplomado Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dip_arc_codigo, 'url' => ['view', 'id' => $model->dip_arc_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diplomado-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
