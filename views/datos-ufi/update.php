<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatosUfi */

$this->title = 'Editando Dato UFI: ';
/*$this->params['breadcrumbs'][] = ['label' => 'Datos Ufis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dat_codigo, 'url' => ['view', 'id' => $model->dat_codigo]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="datos-ufi-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
