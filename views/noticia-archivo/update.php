<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NoticiaArchivo */

$this->title = 'Update Noticia Archivo: ' . $model->not_arc_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Noticia Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->not_arc_codigo, 'url' => ['view', 'id' => $model->not_arc_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="noticia-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
