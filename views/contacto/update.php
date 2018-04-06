<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contacto */

$this->title = 'Update Contacto: ' . $model->con_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->con_codigo, 'url' => ['view', 'id' => $model->con_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contacto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
