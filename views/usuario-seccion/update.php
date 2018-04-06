<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSeccion */

$this->title = 'Update Usuario Seccion: ' . $model->usu_sec_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Seccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usu_sec_codigo, 'url' => ['view', 'id' => $model->usu_sec_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-seccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
