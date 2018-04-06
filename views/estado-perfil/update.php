<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPerfil */

$this->title = 'Update Estado Perfil: ' . $model->est_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Estado Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->est_codigo, 'url' => ['view', 'id' => $model->est_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
