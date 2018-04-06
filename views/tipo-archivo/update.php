<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoArchivo */

$this->title = 'Update Tipo Archivo: ' . $model->tip_arc_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tip_arc_codigo, 'url' => ['view', 'id' => $model->tip_arc_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
