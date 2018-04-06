<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LineaArchivo */

$this->title = 'Update Linea Archivo: ' . $model->lin_arc_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Linea Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lin_arc_codigo, 'url' => ['view', 'id' => $model->lin_arc_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linea-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
