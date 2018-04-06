<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeccionFormacion */

$this->title = 'Update Seccion Formacion: ' . $model->sec_for_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Seccion Formacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sec_for_codigo, 'url' => ['view', 'id' => $model->sec_for_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seccion-formacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
