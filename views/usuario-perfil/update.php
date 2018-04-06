<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioPerfil */

$this->title = 'Update Usuario Perfil: ' . $model->usu_per_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usu_per_codigo, 'url' => ['view', 'id' => $model->usu_per_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
