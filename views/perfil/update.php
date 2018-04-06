<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perfil */

$this->title = 'Update Perfil: ' . $model->per_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->per_codigo, 'url' => ['view', 'id' => $model->per_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
